<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting/M_user', 'model');
    }


    public function index()
    {
        $data = [
            'title'        => 'Setting Pengguna',
            'all'        => $this->model->all(),
            'roles'     => $this->model->roles()
        ];
        $this->load->view('admin/setting/user_list', $data);
    }
    public function store()
    {
        $response = $this->model->insert();
        if ($response['status'] == 1) {
            $this->session->set_flashdata('success', 'Pengguna Berhasil di Tambahkan !');
            redirect('setting/pengguna');
        } else {
            $this->session->set_flashdata('error', 'Pengguna Gagal di Tambahkan !');
            redirect('setting/pengguna');
        }
    }
    public function update()
    {
        $response = $this->model->update();
        if ($response['status'] == 1) {
            $this->session->set_flashdata('success', 'Pengguna Berhasil di edit!');
            redirect('setting/pengguna');
        } else {
            $this->session->set_flashdata('error', 'Pengguna Gagal di edit!');
            redirect('setting/pengguna');
        }
    }
}

/* End of file User.php */
