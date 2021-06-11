<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_realization extends CI_Model
{

    public function all()
    {
        $this->db->select('a.trans_id,a.t_project_id,a.total,a.status,b.t_project_name,c.project_name,c.project_due_date,d.client_name, a.project_progress as progress')
            ->from('transactions as a')
            ->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
            ->join('project as c', 'c.trans_id=a.trans_id')
            ->join('clients as d', 'd.client_id=a.client_id')
            ->where('a.trans_type', 'contract')
            ->where('a.project_progress', '2');

        return $this->db->get()->result_array();
    }

    public function anggaran_list()
    {
        $this->db->select('a.trans_id,a.t_project_id,a.total,a.status,b.t_project_name,c.project_name,c.project_due_date,d.client_name, a.project_progress as progress')
            ->from('transactions as a')
            ->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
            ->join('project as c', 'c.trans_id=a.trans_id')
            ->join('clients as d', 'd.client_id=a.client_id')
            ->where('a.trans_type', 'contract')
            ->where('a.project_progress', '1');

        return $this->db->get()->result_array();
    }

    public function FindBudgeting($trans_id)
    {
        $trans = $this->db->get_where('transactions', ['trans_id' => $trans_id, 'trans_type' => 'contract'])->row_array();

        $detail = $this->db->select('a.trans_id,a.t_project_id,b.pb_id,b.work_id,b.pb_unit,b.pb_qty_budget,b.pb_unit_price_budget,c.work_id,c.work_name,c.work_group_id,d.work_group_name,(b.pb_qty_budget * b.pb_unit_price_budget) as budget')
            ->from('transactions as a')
            ->join('project_budget as b', 'a.trans_id=b.trans_id')
            ->join('type_of_work as c', 'c.work_id=b.work_id')
            ->join('work_group as d', 'd.work_group_id=c.work_group_id')
            ->where('a.trans_id', $trans_id)
            ->where('a.trans_type', 'contract')
            ->get()
            ->result_array();
        $response = [
            'status'        => '200 OK',
            'message'       => 'Record Founded!',
            'values'        => $trans,
            'detail'        => $detail
        ];
        return $response;
    }
}

/* End of file M_realization.php */
