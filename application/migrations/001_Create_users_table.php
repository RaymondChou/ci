<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Migration_Create_users_table extends CI_Migration 
{

	public function up()
	{
		$this->dbforge->add_field("id integer unsigned auto_increment primary key");
		$this->dbforge->add_field("username varchar(255) not null");
		$this->dbforge->add_field("email varchar(255) not null");
		$this->dbforge->add_field("password char(40) not null");
		$this->dbforge->add_field("salt char(40) not null");
		$this->dbforge->add_field("roles integer unsigned not null default 0");
		$this->dbforge->add_field("remember_me_token char(40)");
		$this->dbforge->create_table("users");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('users');
	}

} 
