<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productadd extends CORE_Controller
{

	public function index()
	{

		if ($this->session->userdata('username') != '') {
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('product_add');
			$this->load->view('layout/footer');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function addProduct()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('product', 'Product', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('product_add');
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

			if ($this->db->insert('product', $data)) {
				$msg = array(
					'name' => 'alert alert-success alert-dismissible fade show',
					'error' => 'Added Successfully!!',
					'close' => 'aria-hidden='
				);

				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('productadd'));
				// $this->load->view('layout/header');
				// $this->load->view('layout/aside');
				// $this->load->view('product_add');
				// $this->load->view('layout/footer');
			} else {
				$msg = array(
					'name' => 'alert alert-danger alert-dismissible fade show',
					'error' => 'Failed to add!!',
					'close' => 'aria-hidden='
				);
				$this->session->set_flashdata('msg', $msg);
				redirect(base_url('productadd'));
				// $this->load->view('layout/header');
				// $this->load->view('layout/aside');
				// $this->load->view('product_add');
				// $this->load->view('layout/footer');
			}
		}
	}
}
