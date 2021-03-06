<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outwardview extends CORE_Controller
{

	public function index()
	{

		if ($this->session->userdata('username') != '') {
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getOutward();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('outward_view', $data);
			$this->load->view('layout/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function getDate($start, $end)
	{
		$this->load->library('form_validation');
		$this->load->model('productshow');
		$this->form_validation->set_rules('date1', 'Date', 'trim|required');
		$this->form_validation->set_rules('date2', 'Date', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data   = array();
			$data['result'] = $this->productshow->getOutward();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('inward_add', $data);
			$this->load->view('layout/footer');
		} else {
			$start =  $this->input->post('date1');
			$end =  $this->input->post('date2');
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getOutwardDate($start, $end);
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('inward_view', $data);
			$this->load->view('layout/footer');
		}
	}

	public function outwardDelete($param)
	{
		$data = array(
			'isdel' => 1
		);
		$this->load->model('productshow');
		$value['result'] = $this->productshow->editOutward($param);
		$value['cost'] = $this->productshow->getCost($this->input->post(1));
		$data2 = array(
			'cost' => $value['cost'][0]->cost + $value['result'][0]->totalprice
		);
		$this->db->where('id', $param);
		$check = $this->db->update('outward', $data);
		$this->db->where('id', 1);
		$check = $this->db->update('cost', $data2);
		if ($check) {
			$msg = array(
				'name' => 'alert alert-success alert-dismissible fade show',
				'error' => 'Deleted Successfully!!',
				'close' => 'aria-hidden='
			);

			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('inwardview'));
			// $data   = array();
			// $this->load->model('productshow');
			// $data['result'] = $this->productshow->getInward();
			// $this->load->view('layout/header');
			// $this->load->view('layout/aside');
			// $this->load->view('inward_view', $data);
			// $this->load->view('layout/footer');
		} else {
			$msg = array(
				'name' => 'alert alert-danger alert-dismissible fade show',
				'error' => 'Failed to Delete or cost is negative!',
				'close' => 'aria-hidden='
			);
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('inwardview'));
			// $data   = array();
			// $this->load->model('productshow');
			// $data['result'] = $this->productshow->getInward();
			// $this->load->view('layout/header');
			// $this->load->view('layout/aside');
			// $this->load->view('inward_view', $data);
			// $this->load->view('layout/footer');
		}
	}
}
