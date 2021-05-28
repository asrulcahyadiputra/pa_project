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
}

/* End of file M_realization.php */
