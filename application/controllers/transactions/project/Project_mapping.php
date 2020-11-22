<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Project_mapping extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transactions/M_mapping','model');
	}
	

	public function index()
	{
		$data=[
			'title'		=> 'Pemeteaan Proyek',
			'all'		=> $this->model->all(),
		];
		$this->load->view('admin/transactions/project/mapping/mapping-list', $data);
	}
	public function show()
	{
		$data=[
			'title'	 	=> 'Detail Pemetaan Proyek', 
		];
		$this->load->view('admin/transactions/project/mapping/mapping-detail',$data);
	}
	public function create()
	{
		$data=[
			'title'	 	=> 'Buat Pemetaan Baru', 
			'work_type'	=> $this->model->work_type(),
			'project_type'	=> $this->model->project_type()
		];
		$this->load->view('admin/transactions/project/mapping/mapping-create',$data);
	}
	public function store()
	{
		$response = $this->model->insert();
		if($response['status'] == 1){
			$this->session->set_flashdata('success', 'Pemteaan Berhasil di lakukan !');
			redirect('transaksi/pemetaan');
		}else{
			$this->session->set_flashdata('error', 'Pemetaan gagal di lakukan !');
			redirect('transaksi/pemetaan');
		}
	}

}

/* End of file Project_mapping.php */

?>
