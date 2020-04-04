<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CORE_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Load session library

	}
	public function index()
	{

		if ($this->session->userdata('username') != '') {
			$cost = array();
			$this->load->model('productshow');
			$cost['cost'] = $this->productshow->getCost();
			$cost['product'] = $this->productshow->getProduct();
			$cost['inward'] = $this->productshow->getInwardProduct();
			$cost['outward'] = $this->productshow->getOutwardProduct();
			$cost['grapinward'] = $this->pieChart(1);
			$cost['grapoutward'] = $this->pieChart(2);
			$cost['barinward'] = $this->barChart(1);
			$cost['baroutward'] = $this->barChart(2);
			$cost['tableinward'] = $this->productshow->getInwardTable();
			$cost['tableoutward'] = $this->productshow->getOutwardTable();
			$this->load->view('layout/header');
			$this->load->view('layout/aside');
			$this->load->view('dashboard', $cost);
			$this->load->view('layout/footer');
		} else {
			redirect('login', 'refresh');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect(base_url('login'));
	}

	public function pieChart($param)
	{

		$this->load->model('productshow');
		if ($param == 1) {
			$record = $this->productshow->getInwardProduct();
			$i = 3;
		} else {
			$record = $this->productshow->getOutwardProduct();
			$i = 7;
		}
		$data = [];
		$color = [
			"#A64ACD",
			"#5969ff",
			"#ff407b",
			"#25d5f2",
			"#ffc750",
			"#2ec551",
			"#7040fa",
			"#ff004e",
			"#F39C12",
			"#48C9B0"
		];
		if ($record == false) {
		} else {
			foreach ($record as $row) {
				$data['label'][] = $row->pname;
				$data['data'][] = (int) $row->pprice;
				$data['color'][] = $color[$i];
				if ($i >= 9) {
					$i = 0;
				} else {
					$i = $i + 1;
				}
			}
			return json_encode($data);
		}
	}

	public function barChart($param)
	{

		$this->load->model('productshow');
		if ($param == 1) {
			$record = $this->productshow->getInwardGraph();
			$i = 0;
		} else {
			$record = $this->productshow->getOutwardGraph();
			$i = 5;
		}
		$data = [];
		$color = [
			"#A64ACD",
			"#5969ff",
			"#ff407b",
			"#25d5f2",
			"#ffc750",
			"#2ec551",
			"#7040fa",
			"#ff004e",
			"#F39C12",
			"#48C9B0"
		];
		$bordercolor = [
			"#723D88",
			"#3B47C2",
			"#D82A5F",
			"#13A2B7",
			"#D9980E",
			"#12A033",
			"#4F22D2",
			"#D90042",
			"#D48202",
			"#20AB8F"
		];
		if ($record == false) {
			return false;
		} else {
			foreach ($record as $row) {
				$data['label'][] = $row->pname . '(' . $row->quantity . ')';
				$data['data'][] = (int) $row->totalprice;
				$data['color'][] = $color[$i];
				$data['bordercolor'][] = $bordercolor[$i];
				$data['borderwidth'][] = 2;
				if ($i >= 9) {
					$i = 0;
				} else {
					$i = $i + 1;
				}
			}
			return json_encode($data);
		}
	}
}
