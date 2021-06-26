<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_payment extends CI_Model
{
    public function filter_bukti()
    {
        $req =  $this->db->get_where('transactions', ['trans_type' => 'payment'])->result_array();
        return $req;
    }
    public function filter_kontrak()
    {
        $req =  $this->db->get_where('transactions', ['trans_type' => 'contract'])->result_array();
        return $req;
    }
    // get all transactions
    public function load_report()
    {
        $periode = $this->input->post('periode');
        $no_bukti = $this->input->post('no_bukti');
        $kode_kontrak = $this->input->post('kode_kontrak');

        if ($no_bukti == 'all' && $kode_kontrak == 'all' && $periode == '') {
            $no = 1;
            $trans =  $this->db->select('*')
                ->from('transactions as a')
                ->where('trans_type', 'payment')
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->get_where('payments', ['trans_id' => $val['trans_id']])->result_array();
                    $data[] = [
                        'no'            => $no++,
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref'],
                        'desc'          => $val['description'],
                        'tanggal'       => shortdate_indo($val['payment_date']),
                        'periode'       => $val['periode'],
                        'detail'        => $detail
                    ];
                }
            } else {
                $data = [];
            }

            $res = [
                'success'           => true,
                'values'            => $data,
            ];
        } elseif ($no_bukti == 'all' && $kode_kontrak == 'all' && $periode != '') {
            $no = 1;
            $trans =  $this->db->select('*')
                ->from('transactions as a')
                ->where('trans_type', 'payment')
                ->where('periode', $periode)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->get_where('payments', ['trans_id' => $val['trans_id']])->result_array();
                    $data[] = [
                        'no'            => $no++,
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref'],
                        'desc'          => $val['description'],
                        'tanggal'       => shortdate_indo($val['payment_date']),
                        'periode'       => $val['periode'],
                        'detail'        => $detail
                    ];
                }
            } else {
                $data = [];
            }


            $res = [
                'success'           => true,
                'values'            => $data,
                'periode'           => $periode
            ];
        } elseif ($no_bukti == 'all' && $kode_kontrak != 'all' && $periode == '') {
            $no = 1;
            $trans =  $this->db->select('*')
                ->from('transactions as a')
                ->where('trans_type', 'payment')
                ->where('ref', $kode_kontrak)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->get_where('payments', ['trans_id' => $val['trans_id']])->result_array();
                    $data[] = [
                        'no'            => $no++,
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref'],
                        'desc'          => $val['description'],
                        'tanggal'       => shortdate_indo($val['payment_date']),
                        'periode'       => $val['periode'],
                        'detail'        => $detail
                    ];
                }
            } else {
                $data = [];
            }


            $res = [
                'success'           => true,
                'values'            => $data,
                'kode_kontrak'      => $kode_kontrak
            ];
        } elseif ($no_bukti != 'all' && $kode_kontrak == 'all' && $periode == '') {
            $no = 1;
            $trans =  $this->db->select('*')
                ->from('transactions as a')
                ->where('trans_type', 'payment')
                ->where('trans_id', $no_bukti)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->get_where('payments', ['trans_id' => $val['trans_id']])->result_array();
                    $data[] = [
                        'no'            => $no++,
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref'],
                        'desc'          => $val['description'],
                        'tanggal'       => shortdate_indo($val['payment_date']),
                        'periode'       => $val['periode'],
                        'detail'        => $detail
                    ];
                }
            } else {
                $data = [];
            }


            $res = [
                'success'           => true,
                'values'            => $data,
                'no_bukti'          => $no_bukti
            ];
        } elseif ($no_bukti != 'all' && $kode_kontrak != 'all' && $periode == '') {
            $no = 1;
            $trans =  $this->db->select('*')
                ->from('transactions as a')
                ->where('trans_type', 'payment')
                ->where('trans_id', $no_bukti)
                ->where('ref', $kode_kontrak)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->get_where('payments', ['trans_id' => $val['trans_id']])->result_array();
                    $data[] = [
                        'no'            => $no++,
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref'],
                        'desc'          => $val['description'],
                        'tanggal'       => shortdate_indo($val['payment_date']),
                        'periode'       => $val['periode'],
                        'detail'        => $detail
                    ];
                }
            } else {
                $data = [];
            }


            $res = [
                'success'           => true,
                'values'            => $data,
                'no_bukti'          => $no_bukti
            ];
        } elseif ($no_bukti != 'all' && $kode_kontrak != 'all' && $periode != '') {
            $no = 1;
            $trans =  $this->db->select('*')
                ->from('transactions as a')
                ->where('trans_type', 'payment')
                ->where('trans_id', $no_bukti)
                ->where('ref', $kode_kontrak)
                ->where('periode', $periode)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->get_where('payments', ['trans_id' => $val['trans_id']])->result_array();
                    $data[] = [
                        'no'            => $no++,
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref'],
                        'desc'          => $val['description'],
                        'tanggal'       => shortdate_indo($val['payment_date']),
                        'periode'       => $val['periode'],
                        'detail'        => $detail
                    ];
                }
            } else {
                $data = [];
            }


            $res = [
                'success'           => true,
                'values'            => $data,
                'no_bukti'          => $no_bukti,
                'kode_kontrak'      => $kode_kontrak,
                'periode'           => $periode
            ];
        }



        return $res;
    }
}

/* End of file M_paymnet.php */
