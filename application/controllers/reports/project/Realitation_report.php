<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Realitation_report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        user_log();
        $this->load->model('reports/M_realitation', 'model');
    }

    public function index()
    {
        $data = [
            'title'        => 'Laporan Realisasi',
            'filter1'      => $this->model->filter_bukti(),
            // 'filter2'      => $this->model->filter_kontrak(),
        ];
        $this->load->view('admin/reports/project/realitation_report', $data);
    }

    public function fetch()
    {
        $req = $this->model->load_report();

        echo json_encode($req);
    }
}

/* End of file Realitation_report.php */
