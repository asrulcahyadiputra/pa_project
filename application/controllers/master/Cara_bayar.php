<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cara_bayar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master/M_cara_bayar', 'model');
	}


	public function index()
	{
		$data = [
			'title'		=> 'Master Cara bayar',
			'all'		=> $this->model->all()
		];
		$this->load->view('admin/master/cara_bayar/payment_method', $data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Cara Pembayaran Berhasil di Tambahkan !');
			redirect('Master/bayar');
		} else {
			$this->session->set_flashdata('error', 'Cara Pembayaran Gagal di Tambahkan !');
			redirect('Master/bayar');
		}
	}
	public function update()
	{
		$response = $this->model->update();
		if ($response['status'] == 1) {
			$this->session->set_flashdata('success', 'Cara Pembayaran Berhasil di edit!');
			redirect('Master/bayar');
		} else {
			$this->session->set_flashdata('error', 'Cara Pembayaran Gagal di edit!');
			redirect('Master/bayar');
		}
	}
}

/* End of file Cara_bayar.php */
