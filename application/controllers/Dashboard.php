<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		user_log();
	}

	public function index()
	{
		$data = [
			'title'		=> "CV Mangkubumi"
		];
		// $menu = get_menu($this->session->userdata('role'));
		$this->load->view('home', $data);
		// echo "<pre>";
		// print_r($menu);
		// echo "</pre>";
		// die;
	}
}

/* End of file Dashboard.php */
