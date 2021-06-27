<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_proyek extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('master/M_proyek', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master - Jenis Proyek',
			'all'		=> $this->model->all()
		];
		$this->load->view('admin/master/proyek/type_project', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Jenis Proyek Berhasil di Tambahkan !');
			redirect('Master/proyek');
		} else {
			$this->session->set_flashdata('error', 'Jenis Proyek Gagal di Tambahkan !');
			redirect('Master/proyek');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Jenis Proyek Berhasil di edit!');
			redirect('Master/proyek');
		} else {
			$this->session->set_flashdata('error', 'Jenis Proyek Gagal di edit!');
			redirect('Master/proyek');
		}
	}
}

/* End of file Jenis_proyek.php */
