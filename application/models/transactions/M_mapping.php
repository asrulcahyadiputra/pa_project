<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapping extends CI_Model {
	public function project_type()
	{
		return $this->db->get('type_of_project')->result_array();
	}
	public function work_type()
	{
		$this->db->select("a.work_id,a.work_name,a.work_unit,b.work_group_id,b.work_group_name")
			->from('type_of_work as a')
			->join('work_group as b', 'a.work_group_id=b.work_group_id');

		return $this->db->get()->result_array();
	}
	public function all(){
		$this->db->select('a.trans_id,a.t_project_id,a.description,b.t_project_name')
			->from('transactions as a')
			->join('type_of_project as b','a.t_project_id=b.t_project_id')
			->where('a.trans_type','mapping');

		return $this->db->get()->result_array();
	}
	private function trans_id()
	{
		$this->db->select('RIGHT(trans_id,4) as trans_id', FALSE);
		$this->db->where('trans_type','mapping');
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
		$trans_id = "TRX-MPP-" . $code;
		return $trans_id;
	}
	public function insert(){
		$work_id = $this->input->post('work_id');
		$t_project_id = $this->input->post('t_project_id');
		$validate = $this->db->get_where('transactions',['t_project_id' => $t_project_id,'trans_type' => 'mapping'])->row_array();
		if($validate){
			$response=[
				'status'		=> 0
			];
		}else{
			if($work_id){
				$trans=[
					'trans_id'		=> $this->trans_id(),
					't_project_id'		=> $t_project_id,
					'description'		=> $this->input->post('description'),
					'trans_type'		=> 'mapping'
				];
				foreach($work_id as $key => $val){
					$mapping[]=[
						'trans_id'	=> $this->trans_id(),
						'work_id'		=> $this->input->post('work_id')[$key]
					];
				}
				$this->db->trans_start();
				$this->db->insert('transactions',$trans);
				$this->db->insert_batch('project_mapping',$mapping);
				$this->db->trans_complete();
				$response=[
					'status'		=> 1
				];
			}else{
				$response=[
					'status'		=> 0
				];
			}
		}
		return $response;
	}

}

/* End of file M_mapping.php */

?>
