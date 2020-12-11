<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Material extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_material', 'model');
	}
	public function index()
	{
		$data = [
			'title'		=> 'Material',
			'all'		=> $this->model->all(),
		];
		$this->load->view('admin/master/material/raw_material', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Material Berhasil di Tambahkan !');
			redirect('Master/material');
		} else {
			$this->session->set_flashdata('error', 'Material Gagal di Tambahkan !');
			redirect('Master/material');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Material Berhasil di Edit !');
			redirect('Master/material');
		} else {
			$this->session->set_flashdata('error', 'Material Gagal di Edit !');
			redirect('Master/material');
		}
	}
}

/* End of file Material.php */
