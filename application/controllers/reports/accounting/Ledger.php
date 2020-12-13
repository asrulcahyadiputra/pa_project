<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ledger extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports/M_ledger', 'model');
	}


	public function index()
	{
		$periode = $this->input->post('periode');
		if ($periode === null) {
			$y = date('Y');
			$m = date('m');
		} else {
			$y = date('Y', strtotime($periode));
			$m = date('m', strtotime($periode));
		}
		$data = [
			'title'		=> 'Jurnal Umum',
			'ledger'		=> $this->model->get_ledger($y, $m),
			'row_ledger'	=> $this->model->get_row_jurnal($y, $m),
			'year'		=> $y,
			'month'		=> $m
		];
		$this->load->view('admin/reports/accounting/general_ledger', $data);
	}

	public function ledger()
	{
		$periode = $this->input->get('periode');
		$acc = $this->input->get('account_name');
		if ($periode === null) {
			$y = date('Y');
			$m = date('m');
			$a = 'Kas';
		} else {
			$y = date('Y', strtotime($periode));
			$m = date('m', strtotime($periode));
			$a = $acc;
		}
		$data = [
			'title'		=> 'Buku Besar',
			'all'			=> $this->model->all($y, $m, $a),
			'sub'			=> $this->model->sub_akun(),
			'list_akun'		=> $this->model->akun(),
			'row_ledger'		=> $this->model->get_row_jurnal($y, $m),
			'first'			=> $this->model->first_balance($y, $m, $a),
			'month'			=> $m,
			'year'			=> $y,
			'akun'			=> $a
		];
		$this->load->view('admin/reports/accounting/ledger', $data);
	}
}

/* End of file Ledger.php */
