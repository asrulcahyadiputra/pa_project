<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function roles()
    {
        return $this->db->get('roles')->result_array();
    }
    public function all()
    {
        $this->db->select("a.user_id,a.name,a.username,b.role_name")
            ->from('users as a')
            ->join('roles as b', 'a.role=b.id');

        return $this->db->get()->result_array();
    }

    public function insert()
    {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = [
            'name'             => $this->input->post('name'),
            'username'         => $this->input->post('username'),
            'role'             => $this->input->post('role'),
            'password'         => $password
        ];
        if ($this->db->insert('users', $data)) {
            $response = [
                'status'    => 1
            ];
        } else {
            $response = [
                'status'    => 1
            ];
        }
        return $response;
    }
    public function update()
    {
        $id = $this->input->post('work_id');
        $data = [
            'work_name'        => $this->input->post('work_name'),
            'work_group_id'     => $this->input->post('work_group_id'),
            'work_unit'        => $this->input->post('work_unit'),
            'updated_by'        => 1, //temporary
        ];
        if ($this->db->update('type_of_work', $data, ['work_id' => $id])) {
            $response = [
                'status'    => 1
            ];
        } else {
            $response = [
                'status'    => 1
            ];
        }
        return $response;
    }
}

/* End of file M_user.php */
