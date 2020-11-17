<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_coa', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master CoA',
			'all'		=> $this->model->all(),
			'sub'		=> $this->model->sub(),
			'head'		=> $this->model->head()
		];
		$this->load->view('admin/master/coa/chart_of_account', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Chart of Account Berhasil di Tambahkan !');
			redirect('Master/coa');
		} else {
			$this->session->set_flashdata('error', 'Chart of Account Gagal di Tambahkan !');
			redirect('Master/coa');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Chart of Account Berhasil di edit!');
			redirect('Master/coa');
		} else {
			$this->session->set_flashdata('error', 'Chart of Account Gagal di edit!');
			redirect('Master/coa');
		}
	}
}

/* End of file Coa.php */
