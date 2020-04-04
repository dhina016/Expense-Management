<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginmodel extends CORE_Model
{

	public function user_login($data)
	{
		$user = $data['username'];
        $password = $data['password'];
        $myquery = $this->db->query("SELECT * FROM users WHERE username = '$user'");
        $rows = $myquery->row();
		if (isset($rows)) {
			$hash = $rows->password;
			if (md5($password) == $hash) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
