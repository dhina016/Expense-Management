<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cash extends CORE_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('username') != '') {
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getCost();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('cash_add', $data);
			$this->load->view('layout/footer');
		} else {
			$this->load->view('login');
		}
	}


	public function addCash()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cash', 'Cash', 'trim|required');
        $this->load->model('productshow');
		if ($this->form_validation->run() == FALSE) {
			$data   = array();
			$data['result'] = $this->productshow->getCost();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('cash_add', $data);
			$this->load->view('layout/footer');
		} else {
            $data2   = array();
			$data2['result'] = $this->productshow->getCost();
			$data = array(
				'cost' => $data2['result'][0]->cost+$this->input->post('cash')
            );
            $this->db->where('id', 1);
			$check = $this->db->update('cost', $data);
			if ($check) {
                $msg = array(
					'name' => 'alert alert-success alert-dismissible fade show',
					'error' => 'Successfully Updated!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('cash'),'refresh');
			} else {
				$msg = array(
					'name' => 'alert alert-danger alert-dismissible fade show',
					'error' => 'Failed to add!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('cash'),'refresh');
			}
		}
	}
}
