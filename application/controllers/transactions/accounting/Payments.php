<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transactions/M_payment', 'model');
    }

    public function index()
    {
        $data = [
            'title'        => 'Pembayaran',
            'all'          => $this->model->all()
        ];
        $this->load->view('admin/transactions/accounting/payment/payment_list', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Create Pembayaran',
            'project'   => $this->model->getContract()
        ];
        $this->load->view('admin/transactions/accounting/payment/payment_create', $data);
    }
    public function find_angsuran()
    {
        $trans_id = $this->input->post('trans_id');

        $req = $this->model->find_payment($trans_id);

        echo json_encode($req);
    }
    public function store()
    {
        $req = $this->model->store();
        if ($req['status'] === true) {
            $this->session->set_flashdata('success', 'Berhasil menyimpan pembayaran !');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan pembayaran !');
        }
        redirect('transaksi/pembayaran');
    }
    public function destroy($trans_id)
    {
        $req = $this->model->destroy($trans_id);
        if ($req['status'] === true) {
            $this->session->set_flashdata('success', 'Berhasil menghapus pembayaran !');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pembayaran !');
        }
        redirect('transaksi/pembayaran');
    }
}

/* End of file Payments.php */
