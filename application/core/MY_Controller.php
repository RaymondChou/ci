<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	const SITE_TITLE = 'ci playground';
	const REFERER = 'referer';
	const STATUS_SUCCESS = 1;
	const STATUS_ERROR = 0;
	
	function __construct()
	{
        parent::__construct();
        $this->load->library('session');
        $this->load->library('assets');
        $this->load->library('auth');
		$this->load->library('request');
		$this->load->helper('form');
		$this->load->helper('application');
		$this->load->spark('template/1.9.0');
		
		$this->assets->css('style.css');
		
		$this->template->title(self::SITE_TITLE);
		
		if (! $this->request->is_ajax()) $this->output->enable_profiler(TRUE);

		if (! $this->auth->is_authenticated()) $this->auth->remember_me_check();

	}

	function _remap($method, $params = array())
	{
        $action = "action_{$method}";
		if (method_exists($this, $action))
		{
			call_user_func_array(array($this, $action), $params);
		}
		else
		{
			show_404();
		}
	}
	
	function set_title()
	{
		$args = func_get_args();
		array_unshift($args, self::SITE_TITLE);
		call_user_func_array(array($this->template, 'title'), $args);
	}
	
	function require_authentication()
	{
		if ($this->auth->is_authenticated()) return;
		
		$this->session->set_userdata(self::REFERER, $this->uri->uri_string());
		flash_error('Authentication required');
		
		redirect('signin');
	}
	
	function require_administrator()
	{
		$this->require_authentication();
		if ($this->auth->current_user()->is_administrator()) return;
		
		flash_error('Area is restricted to administrators only.');
		redirect('home');
	}
	
	function require_editor()
	{
		$this->require_authentication();
		if ($this->auth->current_user()->is_editor()) return;
		
		flash_error('Area is restricted to editors only.');
		redirect('home');
	}
	
	function require_ownership_of($object, $related_with = 'user_id')
	{
		if (! $this->auth->current_user()->is_owner_of($object, $related_with)) show_404();
	}

	function render_json($status, $data = array())
	{
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('status' => $status, 'data' => $data)));
	}

	function render_json_success($data = array())
	{
		$this->render_json(self::STATUS_SUCCESS, $data);
	}

	function render_json_failure($data = array())
	{
		$this->render_json(self::STATUS_ERROR, $data);
	}
	
}

