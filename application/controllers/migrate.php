<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Migrate extends CI_Controller 
{
	
	
	public function __construct()
	{
		parent::__construct();
		if (! $this->input->is_cli_request()) show_404();
		$this->load->library('migration');
 	}
 	
 	public function index()
 	{
 		$this->migration->current();
 	}
 	
 	public function version($migration = 0)
 	{
 		$this->migration->version($migration);
 	}

}
