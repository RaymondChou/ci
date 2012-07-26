<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Comment_model extends MY_Model {
    
    protected $_table = 'comments';
    protected $_dto = 'Comment';
    
    public function approved()
    {
        $this->db->where('status', Comment::STATUS_APPROVED);
        return $this;
    }
    
    public function for_post($post_id)
    {
        $this->db->where('post_id', $post_id);
        return $this;
    }
    
}

class Comment {
    
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    
}
