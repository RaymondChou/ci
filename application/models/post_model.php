<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Post_model extends MY_Model {
	
	protected $_table = 'posts';
	protected $_dto = 'Post';
	
	public function published()
	{
		$this->db->where('status', Post::STATUS_PUBLISHED);
		return $this;
	}
	
}


class Post {
	
	const STATUS_DRAFT = 1;
	const STATUS_PUBLISHED = 2;
	
	function permalink()
	{
		return site_url('posts/show/'.$this->id, 'Show');
	}
	
}