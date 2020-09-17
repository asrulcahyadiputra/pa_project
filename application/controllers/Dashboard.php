<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data = [
			'title'		=> "CV Mangkubumi"
		];
		$this->load->view('home', $data);
	}
}

/* End of file Dashboard.php */
