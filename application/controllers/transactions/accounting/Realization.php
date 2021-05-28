<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Realization extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function index()
    {
        $this->load->view('admin/transactions/accounting/realization/realization_list');
    }
}

/* End of file Realization.php */
