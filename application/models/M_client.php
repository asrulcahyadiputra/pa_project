<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_client extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
}

/* End of file M_client.php */
