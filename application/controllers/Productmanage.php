<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productmanage extends CORE_Controller
{

	public function index()
	{

		if ($this->session->userdata('username') != '') {
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getProduct();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('product_manage', $data);
			$this->load->view('layout/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function productEdit($param)
	{

		$data   = array();
		$this->load->model('productshow');
		$data['result'] = $this->productshow->editProduct($param);
		$this->load->view('layout/header');
		$this->load->view('layout/aside');
		$this->load->view('product_edit', $data);
		$this->load->view('layout/footer');
	}

	public function edit($param)
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('product', 'Product', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->editProduct($param);
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('product_edit', $data);
			$this->load->view('layout/footer');
		} else {
			if ($this->input->post('type') === 'inward') {
				$type = 0;
			} else {
				$type = 1;
			}
			$data = array(
				'pname' => $this->input->post('product'),
				'pprice' => $this->input->post('price'),
				'ptype' => $type
			);
			$this->db->where('id', $param);
			$check = $this->db->update('product', $data);
			if ($check) {
				$msg = array(
					'name' => 'alert alert-success alert-dismissible fade show',
					'error' => 'Updated Successfully!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				$data   = array();
				$this->load->model('productshow');
				$data['result'] = $this->productshow->editProduct($param);
				$this->load->view('layout/header');
				$this->load->view('layout/aside');
				$this->load->view('product_edit', $data);
				$this->load->view('layout/footer');
			} else {
				$msg = array(
					'name' => 'alert alert-danger alert-dismissible fade show',
					'error' => 'Failed to update!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				$data   = array();
				$this->load->model('productshow');
				$data['result'] = $this->productshow->editProduct($param);
				$this->load->view('layout/header');
				$this->load->view('layout/aside');
				$this->load->view('product_edit', $data);
				$this->load->view('layout/footer');
			}
		}
	}

	public function productDelete($param)
	{
		$data = array(
			'isdel' => 1
		);
		$this->db->where('id', $param);
		$check = $this->db->update('product', $data);
		if ($check) {
			$msg = array(
				'name' => 'alert alert-success alert-dismissible fade show',
				'error' => 'Deleted Successfully!!',
				'close' => 'aria-hidden='
			);

			$this->session->set_flashdata('msg', $msg);
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getProduct();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('product_manage', $data);
			$this->load->view('layout/footer');
		} else {
			$msg = array(
				'name' => 'alert alert-danger alert-dismissible fade show',
				'error' => 'Failed to Deletr!!',
				'close' => 'aria-hidden='
			);
			$this->session->set_flashdata('msg', $msg);
			$data   = array();
			$this->load->model('productshow');
			$data['result'] = $this->productshow->getProduct();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('product_manage', $data);
			$this->load->view('layout/footer');
		}
	}
}
