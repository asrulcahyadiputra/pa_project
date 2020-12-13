<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Budget_report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports/M_budget', 'model');
	}
	public function index()
	{
		$periode = $this->input->get('periode');
		if ($periode === null) {
			$y = date('Y');
			$m = date('m');
		} else {
			$y = date('Y', strtotime($periode));
			$m = date('m', strtotime($periode));
		}
		$data = [
			'title'		=> 'Anggaran Proyek',
			'all'		=> $this->model->all($y, $m),
			'month'		=> $m,
			'year'		=> $y
		];
		$this->load->view('admin/reports/project/budgeting/budgeting_report', $data);
	}
}

/* End of file Budget_report.php */
