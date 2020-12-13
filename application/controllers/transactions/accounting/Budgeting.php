<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Budgeting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transactions/M_budgeting', 'model');
	}
	public function index()
	{
		$data = [
			'title'		=> 'Anggaran Proyek',
			'all'		=> $this->model->all()
		];
		$this->load->view('admin/transactions/accounting/budgeting/budgeting_list', $data);
	}
	public function create($trans_id)
	{
		$validate = $this->db->get_where('transactions', ['trans_id' => $trans_id])->row_array();
		if ($validate['status'] == 0) {
			$data = [
				'title'		=> 'Anggaran Proyek',
				'trans_id'	=> $trans_id,
				'project'		=> $this->model->select_project($trans_id),
				'mapping'		=> $this->model->select($trans_id),
				'details'		=> $this->model->find_detail($trans_id),
				'materials'	=> $this->model->find_project_material($trans_id),
				'work_type'	=> $this->model->work_type(),
				'work_group'	=> $this->model->work_group(),
			];
			$this->load->view('admin/transactions/accounting/budgeting/budgeting_create', $data);
		} else {
			$data = [
				'title'		=> 'Anggaran Proyek',
				'trans_id'	=> $trans_id,
				'project'		=> $this->model->select_project($trans_id),
				'mapping'		=> $this->model->select($trans_id),
				'details'		=> $this->model->select_detail($trans_id),
				'materials'	=> $this->model->select_material($trans_id),
				'work_type'	=> $this->model->work_type(),
				'work_group'	=> $this->model->work_group(),
			];
			$this->load->view('admin/transactions/accounting/budgeting/budgeting_detail', $data);
		}
	}
	public function edit($trans_id)
	{
		$validate = $this->db->get_where('transactions', ['trans_id' => $trans_id])->row_array();
		if ($validate['status'] == 1) {
			$data = [
				'title'		=> 'Anggaran Proyek',
				'trans_id'	=> $trans_id,
				'project'		=> $this->model->select_project($trans_id),
				'mapping'		=> $this->model->select($trans_id),
				'details'		=> $this->model->select_detail($trans_id),
				'materials'	=> $this->model->select_material($trans_id),
				'work_type'	=> $this->model->work_type(),
				'work_group'	=> $this->model->work_group(),
			];
			$this->load->view('admin/transactions/accounting/budgeting/budgeting_edit', $data);
		} else {
			$this->session->set_flashdata('warning', 'Rencana Anggaran Biaya tidak dapat diedit !');
			redirect('transaksi/anggaran');
		}
	}
	public function update()
	{
		$request = $this->model->update();
		if ($request['status'] == 1) {
			$this->session->set_flashdata('sukses', 'Berhasil mengedit Rencana Anggaran Biaya !');
			redirect('transaksi/anggaran');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengedit Rencana Anggaran Biaya !');
			redirect('transaksi/anggaran');
		}
	}
	public function store()
	{
		$request = $this->model->insert();
		if ($request['status'] == 1) {
			$this->session->set_flashdata('success', 'Berhasil membuat Rencana Anggaran Biaya !');
			redirect('transaksi/anggaran');
		} else {
			$this->session->set_flashdata('error', 'Gagal membuat Rencana Anggaran Biaya !');
			redirect('transaksi/anggaran');
		}
	}
}

/* End of file Budgeting.php */
