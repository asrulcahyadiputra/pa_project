<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_realitation extends CI_Model
{
    public function filter_bukti()
    {
        $req =  $this->db->get_where('transactions', ['trans_type' => 'realitation'])->result_array();
        return $req;
    }
    // public function filter_kontrak()
    // {
    //     $req =  $this->db->get_where('transactions', ['trans_type' => 'contract'])->result_array();
    //     return $req;
    // }
    // get all transactions
    public function load_report()
    {
        $periode = $this->input->post('periode');
        $no_bukti = $this->input->post('no_bukti');

        if ($no_bukti == 'all' && $periode == '') {
            $no = 1;
            $trans =  $this->db->select('a.trans_id, a.ref_realitation, a.total,date(a.trans_date) as tanggal,a.periode,c.project_name')
                ->from('transactions as a')
                ->join('transactions as b', 'a.ref_realitation = b.trans_id')
                ->join('project as c', 'b.trans_id = c.trans_id')
                ->where('a.trans_type', 'realitation')
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->select('a.work_id, ,a.budget,a.realitation,b.work_name')
                        ->from('project_realitations as a')
                        ->join('type_of_work as b', 'a.work_id=b.work_id')
                        ->where('a.trans_id', $val['trans_id'])
                        ->get()
                        ->result_array();
                    $data[] = [
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref_realitation'],
                        'desc'          => $val['project_name'],
                        'tanggal'       => shortdate_indo($val['tanggal']),
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
        } elseif ($no_bukti == 'all'  && $periode != '') {
            $no = 1;
            $trans =  $this->db->select('a.trans_id, a.ref_realitation, a.total,date(a.trans_date) as tanggal,a.periode,c.project_name')
                ->from('transactions as a')
                ->join('transactions as b', 'a.ref_realitation = b.trans_id')
                ->join('project as c', 'b.trans_id = c.trans_id')
                ->where('a.trans_type', 'realitation')
                ->where('a.periode', $periode)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->select('a.work_id, ,a.budget,a.realitation,b.work_name')
                        ->from('project_realitations as a')
                        ->join('type_of_work as b', 'a.work_id=b.work_id')
                        ->where('a.trans_id', $val['trans_id'])

                        ->get()
                        ->result_array();
                    $data[] = [
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref_realitation'],
                        'desc'          => $val['project_name'],
                        'tanggal'       => shortdate_indo($val['tanggal']),
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
        } elseif ($no_bukti != 'all'  && $periode == '') {
            $no = 1;
            $trans =  $this->db->select('a.trans_id, a.ref_realitation, a.total,date(a.trans_date) as tanggal,a.periode,c.project_name')
                ->from('transactions as a')
                ->join('transactions as b', 'a.ref_realitation = b.trans_id')
                ->join('project as c', 'b.trans_id = c.trans_id')
                ->where('a.trans_type', 'realitation')
                ->where('a.trans_id', $no_bukti)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->select('a.work_id, ,a.budget,a.realitation,b.work_name')
                        ->from('project_realitations as a')
                        ->join('type_of_work as b', 'a.work_id=b.work_id')
                        ->where('a.trans_id', $val['trans_id'])

                        ->get()
                        ->result_array();
                    $data[] = [
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref_realitation'],
                        'desc'          => $val['project_name'],
                        'tanggal'       => shortdate_indo($val['tanggal']),
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
        } elseif ($no_bukti != 'all' && $periode != '') {
            $no = 1;
            $trans =  $this->db->select('a.trans_id, a.ref_realitation, a.total,date(a.trans_date) as tanggal,a.periode,c.project_name')
                ->from('transactions as a')
                ->join('transactions as b', 'a.ref_realitation = b.trans_id')
                ->join('project as c', 'b.trans_id = c.trans_id')
                ->where('a.trans_type', 'realitation')
                ->where('a.periode', $periode)
                ->where('a.trans_id', $no_bukti)
                ->get()
                ->result_array();
            if (count($trans) > 0) {
                foreach ($trans as $key => $val) {
                    $detail = $this->db->select('a.work_id, ,a.budget,a.realitation,b.work_name')
                        ->from('project_realitations as a')
                        ->join('type_of_work as b', 'a.work_id=b.work_id')
                        ->where('a.trans_id', $val['trans_id'])

                        ->get()
                        ->result_array();
                    $data[] = [
                        'trans_id'      => $val['trans_id'],
                        'ref'           => $val['ref_realitation'],
                        'desc'          => $val['project_name'],
                        'tanggal'       => shortdate_indo($val['tanggal']),
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
        }



        return $res;
    }
}

/* End of file M_paymnet.php */
