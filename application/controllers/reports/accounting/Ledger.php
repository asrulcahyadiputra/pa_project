<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports/M_ledger','model');
		
	}
	

	public function index()
	{
		$periode = $this->input->post('periode');
		if($periode === null){
			$y = date('Y');
			$m = date('m');
		}else{
			$y = date('Y',strtotime($periode));
			$m = date('m',strtotime($periode));
		}
		$data=[
			'title'		=> 'Jurnal Umum',
			'ledger'		=> $this->model->get_ledger($y,$m),
			'row_ledger'	=> $this->model->get_row_jurnal($y,$m),
			'year'		=> $y,
			'month'		=> $m
		];
		$this->load->view('admin/reports/accounting/general_ledger', $data);
		
	}

}

/* End of file Ledger.php */


?>
