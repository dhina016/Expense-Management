<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CORE_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->db->db_select(DATABASE_NAME);
    }
}