<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function action_create()
	{
		$this->set_title('sign up');
		$this->load->library('form_validation');
		
		if ($this->request->is_post())
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|is_unique[users.username]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('password_confirmation', 'Confirmation', 'trim|required|matches[password]');
			
			if ($this->form_validation->run())
			{
				$this->user_model->create(array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				));
				
				flash_success('Registration successfull.');
				redirect('/');
			}
		}
		
		$this->template->build('users/create', array(
			'errors' => $this->form_validation->errors(),
		));
	}
	
}