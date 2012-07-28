<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Migration_Create_posts_table extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field("id integer unsigned auto_increment primary key");
		$this->dbforge->add_field("title varchar(255) not null");
		$this->dbforge->add_field("content text");
		$this->dbforge->add_field("user_id integer unsigned not null");
		$this->dbforge->add_field("status tinyint unsigned default 0");
		$this->dbforge->add_field("created_at integer unsigned not null");
		$this->dbforge->add_field("published_at integer unsigned not null");
		$this->dbforge->create_table("posts");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('posts');
	}
}
