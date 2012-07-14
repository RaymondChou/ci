<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_model extends MY_Model {
	
	protected $_table = 'users';
	protected $_dto = 'User';

	function has_password($user, $password)
	{
		return $user->password === $this->hash_password($password, $user->salt);
	}

	function hash_password($password, $salt)
	{
		return sha1($password.$salt);
	}

	function generate_salt()
	{
		return sha1(time());
	}

	function generate_token($user_id)
	{
		return sha1(time().$user_id);
	}

	function create($props = array())
	{
		if (empty($this->salt)) $props['salt'] =  $this->generate_salt();
		$props['password'] = $this->hash_password($props['password'], $props['salt']);
		return parent::create($props);
	}
}


class User {
	
	const MEMBER = 1;
	const ADMINISTRATOR = 2;
	const SUPER_ADMIN = 4;
	
	const STATUS_ACTIVE = 1;
	const STATUS_LOCKED = 2;
	
	function has_role($role)
	{
		return (bool) ($this->role & $role); 
	}
	
	function is_administrator()
	{
		return $this->has_role(self::ADMINISTRATOR);
	}
	
	function is_member()
	{
		return $this->has_role(self::MEMBER);
	}
	
	function is_owner_of($object, $key = 'user_id')
	{
		return $this->id == $object->{$key};
	}
	
	function is_locked()
	{
		return $this->status == self::STATUS_LOCKED;
	}
	
	function is_active()
	{
		return $this->status == self::STATUS_ACTIVE;
	}
	

}
