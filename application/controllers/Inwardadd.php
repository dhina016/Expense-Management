<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inwardadd extends CORE_Controller
{

	public function index()
	{

		if ($this->session->userdata('username') != '') {
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getInwardProduct();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('inward_add', $data);
			$this->load->view('layout/footer');
		} else {
			redirect('login', 'refresh');
		}
	}
	public function add()
	{

		$this->load->library('form_validation');
		$this->load->model('productshow');
		$this->form_validation->set_rules('pquantity', 'Quantity', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data   = array();
			$data['result'] = $this->productshow->getInwardProduct();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('inward_add', $data);
			$this->load->view('layout/footer');
		} else {
			$value['result'] = $this->productshow->editProduct($this->input->post('pid'));
			//$value['result'] return only one row
			$data = array(
				'pprice' => $value['result'][0]->pprice,
				'quantity' => $this->input->post('pquantity'),
				'totalprice' => $value['result'][0]->pprice * $this->input->post('pquantity'),
				'pid' => $this->input->post('pid'),
				'date' => $this->input->post('date'),
				'isdel' => 0
			);
			$value['cost'] = $this->productshow->getCost($this->input->post(1));
			$data2 = array(
				'cost' => $value['cost'][0]->cost + ($value['result'][0]->pprice * $this->input->post('pquantity'))
			);

			$this->db->where('id', 1);
			$check = $this->db->update('cost', $data2);
			if ($this->db->insert('inward', $data) && $check) {
				$msg = array(
					'name' => 'alert alert-success alert-dismissible fade show',
					'error' => 'Added Successfully!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('inwardadd'));
				// $this->load->view('layout/header');
				// $this->load->view('layout/aside');
				// $this->load->view('inward_add', $data);
				// $this->load->view('layout/footer');
			} else {
				$msg = array(
					'name' => 'alert alert-danger alert-dismissible fade show',
					'error' => 'Failed to add!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('inwardadd'));
				// $data   = array();
				// $data['result'] = $this->productshow->getInwardProduct();
				// $this->load->view('layout/header');
				// $this->load->view('layout/aside');
				// $this->load->view('inward_add', $data);
				// $this->load->view('layout/footer');
			}
		}
	}
}
