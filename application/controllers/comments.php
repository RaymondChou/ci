<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Comments extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
    }
    
    public function action_index($post_id = 0, $offset = 0)
    {
        $this->load->library('pagination');
        $this->pagination->initialize(array(
            'total_rows' => $this->comment_model->for_post($post_id)->count(),
            'base_url' => site_url('comments/index/'.$post_id),
            'per_page' => 5,
            'uri_segment' => 4,
        ));
        $comments = $this->comment_model
                ->for_post($post_id)
                ->paginate($offset, $this->pagination->per_page)->all();
        
        $this->load->view('comments/index', array(
            'comments' => $comments,
            'pagination' => $this->pagination->create_links(),
        ));
    }
    
    public function action_create($post_id = 0)
    {
        $this->load->library('form_validation');
        
        if ($this->request->is_post())
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            
            if ($this->form_validation->run())
            {
                $this->comment_model->create(array(
                    'post_id' => $post_id,
                    'created_at' => time(),
                    'status' => Comment::STATUS_PENDING,
                    'username' => $this->input->post('username', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'content' => $this->input->post('content')
                ));
                $this->render_json_success();
                return;
            }
        }
        
        $html = $this->load->view('comments/create', array(
           'post_id' => $post_id,
           'errors' => $this->form_validation->errors(), 
        ), TRUE);
        $this->render_json(0, array('html' => $html));
    }
    
}
