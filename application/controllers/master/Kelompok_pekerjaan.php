<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_pekerjaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_kelompok', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master Kelompok Pekerjaan',
			'all'		=> $this->model->all()
		];
		$this->load->view('admin/master/kelompok/work_group', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Kelompok Pekerjaan Berhasil di Tambahkan !');
			redirect('Master/kelompok');
		} else {
			$this->session->set_flashdata('error', 'Kelompok Pekerjaan Gagal di Tambahkan !');
			redirect('Master/kelompok');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Kelompok Pekerjaan Berhasil di Edit !');
			redirect('Master/kelompok');
		} else {
			$this->session->set_flashdata('error', 'Kelompok Pekerjaan Gagal di Edit !');
			redirect('Master/kelompok');
		}
	}
}

/* End of file Kelompok_pekerjaan.php */
