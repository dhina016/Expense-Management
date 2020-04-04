<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CORE_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('username') != '') {
			redirect('', 'refresh');
		} else {
			$this->load->view('login');
		}
	}


	public function user_login_process()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->load->model('loginmodel');
			$result = $this->loginmodel->user_login($data);
			if ($result == TRUE) {
				//echo 'true';
				$username = $this->input->post('username');
				$result = $this->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $username
					);
					// Add user data in session
					$this->session->set_userdata($session_data);
					$msg = array('name' => 'alert alert-success', 'error' => 'das');
					$this->session->set_flashdata('msg', $msg);
					redirect('','refresh');
				}
			} else {
				$msg = array('name' => 'alert alert-danger', 'error' => 'Invalid Username or Password');
				$this->session->set_flashdata('msg', $msg);
				$this->load->view('login', $data);
			}
		}
	}

	public function read_user_information($username)
	{

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}
