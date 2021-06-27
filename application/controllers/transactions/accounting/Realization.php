<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Realization extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        user_log();
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

    public function fetch()
    {
        $trans_id = $this->input->post('trans_id');

        $response = $this->model->FindBudgeting($trans_id);

        echo json_encode($response);
    }
    public function store()
    {
        $response =  $this->model->store();
        $this->session->set_flashdata('success', 'Data Berhasil Disimpan !');
        redirect('transaksi/realisasi');
        // echo "<pre>";
        // print_r($response);
        // echo "</pre>";

        // die;
    }
    public function preview()
    {
        $trans_id = $this->input->post('trans_id');
        $ref_id = $this->input->post('ref_realitation');
        $response = $this->model->preview($trans_id, $ref_id);

        echo json_encode($response);
    }
}

/* End of file Realization.php */
