<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_payment extends CI_Model
{

    private function trans_id($trans_type)
    {
        $this->db->select('RIGHT(trans_id,9) as trans_id', FALSE);
        $this->db->where('trans_type', $trans_type);
        $this->db->order_by('trans_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transactions');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intval($data->trans_id) + 1;
        } else {
            $id = 1;
        }
        $code = str_pad($id, 9, "0", STR_PAD_LEFT);
        if ($trans_type == 'contract') {
            $val  = 'TRX-KNT';
        } else {
            $val = 'TRX-PYM';
        }
        $trans_id = "$val-" . $code;
        return $trans_id;
    }
    public function getContract()
    {
        $this->db->select('a.trans_id,a.t_project_id,a.total,a.dp,a.ppn,a.contract_value,b.t_project_name,c.project_name,c.project_due_date,d.client_name')
            ->from('transactions as a')
            ->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
            ->join('project as c', 'c.trans_id=a.trans_id')
            ->join('clients as d', 'd.client_id=a.client_id')
            ->where('a.trans_type', 'contract')
            ->where('a.project_progress >', 0);

        return $this->db->get()->result_array();
    }
    // get all transactions
    public function all()
    {
        $res =  $this->db->select('*')
            ->from('transactions as a')
            ->where('trans_type', 'payment')
            ->get()
            ->result_array();
        return $res;
    }

    public function find_payment($trans_id)
    {
        $countPayment = $this->db->select('count(payment_id) as countPayment')
            ->from('payments')
            ->where('ref_contract', $trans_id)
            ->group_by('ref_contract')
            ->get()
            ->row_array();
        $sumPayment = $this->db->select('sum(nominal) as sumPayment')
            ->from('payments')
            ->where('ref_contract', $trans_id)
            ->group_by('ref_contract')
            ->get()
            ->row_array();
        $contract = $this->db->get_where('transactions', ['trans_id' => $trans_id])->row_array();
        $paymentMethod = $this->db->get_where('payment_method', ['p_method_id' => $contract['p_method_id']])->row_array();
        $sisaPiutang = intval($contract['total'] - $sumPayment['sumPayment']);
        $sisaAngsuran = intval($paymentMethod['p_method_step'] - $countPayment['countPayment']);
        $totalAngusran = intval(($contract['total'] - $sumPayment['sumPayment']) / $sisaAngsuran);


        $angsuranKe = intval($countPayment['countPayment'] + 1);
        for ($i = 0; $i < $sisaAngsuran; $i++) {
            $data[] = [
                'id'                => '<input type="checkbox" name="id" value="' . $i . '">',
                'ket'               => 'Angsuran Ke-' . $angsuranKe++,
                'countBayar'        => intval($countPayment['countPayment']),
                'piutang'           => $sisaPiutang,
                'total_angsuran'    => $totalAngusran,
                'sisa_angsuran'     => $sisaAngsuran,
                'nominal'           => $totalAngusran
            ];
        }
        return $data;
    }
}

/* End of file M_paymnet.php */
