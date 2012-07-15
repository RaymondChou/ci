<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Sessions extends MY_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function action_create()
    {
        $this->set_title('signin');
        $this->load->library('form_validation');
        
        $message = '';
        
        if ($this->request->is_post())
        {
   			$this->form_validation->set_rules('username', 'Username', 'trim|required');
   			$this->form_validation->set_rules('password', 'Password', 'trim|required');

   			if ($this->form_validation->run() and $this->auth->authenticate(
   				$this->input->post('username'),
   				$this->input->post('password')	))
   			{
   				flash_success('Welcome '.$this->auth->current_user()->username);
   				redirect($this->session->userdata(self::REFERER, '/'));
   			}
   			
   			$message = 'Wrong username and password combination';
        }
        
        $this->template->build('sessions/create', array(
            'message' => $message,
        ));
    }
    
    public function action_destroy()
    {
        $this->auth->logout();
        flash_success('Logout successfull.');
        redirect('/');
    }
    
}
