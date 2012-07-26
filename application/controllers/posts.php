<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Posts extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
	}
	
	public function action_index($offset = 0)
	{
		$this->set_title('posts');
		$this->load->library('pagination');
		$this->pagination->initialize(array(
			'total_rows' => $this->post_model->published()->count(),
			'base_url' => site_url('posts/index'),		
		));
		$posts = $this->post_model->published()->paginate($offset, $this->pagination->per_page)->all();
		
		$this->template->build('posts/index', array(
			'posts' => $posts,
			'pagination' => $this->pagination->create_links(),	
		));
	}
	
	public function action_create()
	{
		$this->require_editor();
		
		$this->set_title('create post');
		$this->load->library('form_validation');
		
		if ($this->request->is_post())
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
			if ($this->form_validation->run())
			{
				$published_at = $this->input->post('status') == Post::STATUS_PUBLISHED ? time() : 0;
				$this->post_model->create(array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'status' => $this->input->post('status'),
					'user_id' => $this->auth->user_id(),
					'created_at' => time(),
					'published_at' => $published_at,		
				));
				flash_success('Post created successfully.');
				redirect('/');
			}
		}
		
		$this->template->build('posts/create', array(
			'errors' => $this->form_validation->errors(),		
		));
	}
	
	public function action_show($post_id = 0)
	{
		$post = $this->post_model->published()->get_object_or_404(array('id' => $post_id));
		$this->set_title($post->title);
        $this->assets->js('posts/show.js');
		$this->template->build('posts/show', array(
			'post' => $post,	
		));
	}
	
	public function action_edit($post_id = 0)
	{
		$this->require_authentication();
		$post = $this->post_model->get_object_or_404(array('id' => $post_id));
		$this->require_ownership_of($post);
		
		$this->set_title('edit '.$post->title);
		
		$this->load->library('form_validation');
		
		if ($this->request->is_put())
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
			if ($this->form_validation->run())
			{
				$this->post_model->update($post->id, array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
					'status' => $this->input->post('status'),	
				));
				flash_success('Post updated successfully.');
				redirect($post->permalink());
			}
		}
		
		$this->template->build('posts/edit', array(
			'errors' => $this->form_validation->errors(),
			'post' => $post,	
		));
	}
	
	public function action_destroy($post_id = 0)
	{
		$this->require_authentication();
		$post = $this->post_model->get_object_or_404(array('id' => $post_id));
		$this->require_ownership_of($post);
		
		$this->post_model->delete($post->id);
		flash_success('Post deleted successfully.');
		redirect('/');
	}
	
}
