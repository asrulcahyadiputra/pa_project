<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_log();
		$this->load->model('master/M_pelanggan', 'model');
	}

	public function index()
	{
		$data = [
			'title'		=> 'Master Pelanggan',
			'all'		=> $this->model->all()
		];
		$this->load->view('admin/master/pelanggan/client', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Pelanggan Berhasil di Tambahkan !');
			redirect('Master/pelanggan');
		} else {
			$this->session->set_flashdata('error', 'Pelanggan Gagal di Tambahkan !');
			redirect('Master/pelanggan');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Pelanggan Berhasil di Edit !');
			redirect('Master/pelanggan');
		} else {
			$this->session->set_flashdata('error', 'Pelanggan Gagal di Edit !');
			redirect('Master/pelanggan');
		}
	}
}

/* End of file Pelanggan.php */
