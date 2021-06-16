<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_realization extends CI_Model
{
    private function trans_id()
    {
        $this->db->select('RIGHT(trans_id,9) as trans_id', FALSE);
        $this->db->where('trans_type', 'realitation');
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
        $trans_id = "TRX-RLS-" . $code;
        return $trans_id;
    }

    public function all()
    {
        $all = $this->db->get_where('transactions', ['trans_type' => 'realitation'])->result_array();

        return $all;
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

        foreach ($detail as $rowDetail) {
            $dataDetail[] = [
                'work_id'       => '<input class="form-control" name="work_id[]" value=' . $rowDetail['work_id'] . ' readonly />',
                'work_name'     => $rowDetail['work_name'],
                'budget'        => '<input class="form-control" name="budget[]" value="' . nominal($rowDetail['budget']) . '" readonly />',
                'input_field'   => '<input class="form-control" name="realization[]" data-type="currency" required/>'
            ];
        }
        $response = [
            'status'        => '200 OK',
            'message'       => 'Record Founded!',
            'values'        => $trans,
            'detail'        => $dataDetail
        ];
        return $response;
    }

    public function store()
    {
        $total_realisasi = 0;
        $trans_id = $this->trans_id();
        $proyek = $this->input->post('proyek');
        $work_id = $this->input->post('work_id');
        foreach ($work_id as $key => $rowData) {
            $realisasi[] = [
                'trans_id'      => $trans_id,
                'work_id'       => $work_id[$key],
                'budget'        => intval(preg_replace("/[^0-9]/", "", $this->input->post('budget')[$key])),
                'realitation'   => intval(preg_replace("/[^0-9]/", "", $this->input->post('realization')[$key])),
            ];

            $total_realisasi = $total_realisasi + intval(preg_replace("/[^0-9]/", "", $this->input->post('realization')[$key]));
        }
        $update = [
            'status'                => 2,
            'project_progress'      => 2
        ];
        $trans = [
            'trans_id'          => $trans_id,
            'ref_realitation'   => $proyek,
            'trans_type'        => 'realitation',
            'total'             => $total_realisasi
        ];


        $this->db->trans_start();
        $this->db->insert('transactions', $trans);
        $this->db->insert_batch('project_realitations', $realisasi);
        $this->db->update('transactions', $update, ['trans_id' => $proyek]);
        $this->db->trans_complete();

        $response = [
            'trans'         => $trans,
            'realitation'   => $realisasi
        ];




        return $response;
    }
    private function find_realitation($trans_id = null)
    {
        $realisasi = $this->db->select('a.trans_id, a.work_id,a.budget,a.realitation, b.work_name')
            ->from('project_realitations as a')
            ->join('type_of_work as b', 'a.work_id=b.work_id')
            ->where('trans_id', $trans_id)
            ->get()
            ->result_array();
        return $realisasi;
    }

    private function find_project($trans_id)
    {
        $project =  $this->db->select('a.trans_id,a.t_project_id,a.surface_area,a.total,a.dp,a.ppn,a.contract_value,a.project_progress,b.t_project_name,b.type,c.project_name,c.project_start,c.project_due_date,d.client_name,d.client_phone,d.client_address,e.p_method_step')
            ->from('transactions as a')
            ->join('type_of_project as b', 'a.t_project_id=b.t_project_id')
            ->join('project as c', 'c.trans_id=a.trans_id')
            ->join('clients as d', 'd.client_id=a.client_id')
            ->join('payment_method as e', 'a.p_method_id=e.p_method_id')
            ->where('a.trans_type', 'contract')
            ->where('a.trans_id', $trans_id)
            ->get()
            ->row_array();
        return $project;
    }

    public function preview($trans_id, $ref_id)
    {
        $desc = $this->find_project($ref_id);
        $realisasi = $this->find_realitation($trans_id,);
        $no = 1;
        foreach ($realisasi as $realisasiData) {
            if ($realisasiData['realitation'] > $realisasiData['budget']) {
                $class = 'text-danger';
                $different = intval($realisasiData['realitation'] - $realisasiData['budget']);
            } elseif ($realisasiData['realitation'] <= $realisasiData['budget']) {
                $class = 'text-success';
                $different = intval($realisasiData['budget'] - $realisasiData['realitation']);
            }
            $prevRealisasi[] = [
                'no'             => $no++,
                'work_id'        => $realisasiData['work_id'],
                'work_name'     => $realisasiData['work_name'],
                'budget'         => nominal($realisasiData['budget']),
                'realitation'    => nominal($realisasiData['realitation']),
                'different'      => '<span class="' . $class . '">' . nominal($different) . '</span>'
            ];
        }
        $data = [
            'success'   => true,
            'trans_id'  => $trans_id,
            'ref'       => $ref_id,
            'desc'      => $desc,
            'detail'    => $prevRealisasi
        ];
        return $data;
    }
}

/* End of file M_realization.php */
