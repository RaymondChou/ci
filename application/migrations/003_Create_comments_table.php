<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Migration_Create_comments_table extends CI_Migration 
{
	
	
	public function up()
	{
		$this->dbforge->add_field("id integer unsigned auto_increment primary key");
		$this->dbforge->add_field("email varchar(255) not null");
		$this->dbforge->add_field("username varchar(255) not null");
		$this->dbforge->add_field("post_id integer unsigned not null");
		$this->dbforge->add_field("created_at integer unsigned not null");
		$this->dbforge->add_field("status tinyint default 0");
		$this->dbforge->add_field("content text");
		$this->dbforge->create_table("comments");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('comments');
	}
	
	
}
