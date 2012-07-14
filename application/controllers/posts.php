<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Posts extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function action_index()
	{
		$this->template->build('posts/index');
	}
	
}
