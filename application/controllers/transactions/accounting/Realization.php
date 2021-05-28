<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Realization extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('transactions/M_realization', 'model');
    }


    public function index()
    {
        $data = [
            'title'     => 'Realisasi Anggaran',
            'all'       => $this->model->all()
        ];
        $this->load->view('admin/transactions/accounting/realization/realization_list', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Create Realisasi',
            'anggaran'      => $this->model->anggaran_list()
        ];
        $this->load->view('admin/transactions/accounting/realization/realization_create', $data);
    }
}

/* End of file Realization.php */
