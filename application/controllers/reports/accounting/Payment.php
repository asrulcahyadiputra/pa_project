<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reports/M_payment', 'model');
    }

    public function index()
    {
        $data = [
            'title'        => 'Pembayaran',
            'filter1'      => $this->model->filter_bukti(),
            'filter2'      => $this->model->filter_kontrak(),
        ];
        $this->load->view('admin/reports/accounting/payment_report', $data);
    }

    public function fetch()
    {
        $req = $this->model->load_report();

        echo json_encode($req);
    }
}

/* End of file Payments.php */
