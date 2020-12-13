<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contract extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transactions/M_contract', 'model');
	}

	public function index()
	{
		$data = [
			'title'		=> 'Kontrak',
			'all'		=> $this->model->all()
		];
		$this->load->view('admin/transactions/project/contract/contract_list', $data);
	}
	public function show($id)
	{
		$data = [
			'title'		=> 'Kontrak',
			'project'		=> $this->model->select($id),
			'py'			=> $this->model->count_payment($id),
			'tm'			=> $this->model->timeline($id),
			'trans_id'	=> $id
		];
		$this->load->view('admin/transactions/project/contract/contract_detail', $data);
	}
	public function create()
	{
		$data = [
			'title'			=> 'Kontrak Baru',
			'clients'			=> $this->model->clients(),
			'type_project'		=> $this->model->type_of_project(),
			'payment_method'	=> $this->model->payment_method()
		];
		$this->load->view('admin/transactions/project/contract/contract_create', $data);
	}
	public function find_type_project()
	{
		$t_project_id = $this->input->post('t_project_id');
		$request = $this->model->find_type_project($t_project_id);
		echo json_encode($request);
	}
	public function store()
	{
		$this->model->insert();
		$this->session->set_flashdata('success', 'Kontrak berhasil di simpan !');
		redirect('transaksi/kontrak/baru');
	}
	public function add_timeline($trans_id)
	{
		$this->model->add_timeline($trans_id);
		$this->session->set_flashdata('success', 'Timline berhasil ditambahkan');
		redirect('transaksi/kontrak/detail/' . $trans_id);
	}
	public function start($id)
	{
		$this->model->start($id);
		$this->session->set_flashdata('success', 'Status Kontrak Proyek  berhasil di perbaharui !');
		redirect('transaksi/kontrak/detail/' . $id);
	}
}

/* End of file Contract.php */
