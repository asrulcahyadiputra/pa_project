<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('master/M_pekerjaan', 'model');
	}

	public function index()
	{
		$data = [
			'title'		=> 'Master Pekerjaan',
			'all'		=> $this->model->all(),
			'ref_list'	=> $this->model->work_group_list()
		];
		$this->load->view('admin/master/pekerjaan/type_of_work', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Jenis Pekerjaan Berhasil di Tambahkan !');
			redirect('Master/pekerjaan');
		} else {
			$this->session->set_flashdata('error', 'Jenis Pekerjaan Gagal di Tambahkan !');
			redirect('Master/pekerjaan');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Jenis Pekerjaan Berhasil di edit!');
			redirect('Master/pekerjaan');
		} else {
			$this->session->set_flashdata('error', 'Jenis Pekerjaan Gagal di edit!');
			redirect('Master/pekerjaan');
		}
	}
}

/* End of file Pekerjaan.php */
