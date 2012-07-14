<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('request');
		$this->load->library('assets');
		$this->load->library('session');
		$this->load->library('auth');
		
		$this->load->helper('form');
		
		$this->load->spark('template/1.9.0');
	}
	
	public function _remap($method, $params = array())
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
}
