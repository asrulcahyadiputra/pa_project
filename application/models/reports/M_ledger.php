<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_ledger extends CI_Model
{
	public function sub_akun()
	{
		return $this->db->get('coa_subhead')->result_array();
	}
	public function akun()
	{
		return $this->db->get('chart_of_account')->result_array();
	}

	public function get_ledger($y, $m)
	{
		$this->db->select('a.gl_ref,a.account_no,a.gl_date,a.gl_nominal,a.gl_balance,b.account_name')
			->from('general_ledger as a')
			->join('chart_of_account as b', 'a.account_no=b.account_no')
			->where('month(a.gl_date)', $m)
			->where('year(a.gl_date)', $y)
			->order_by('a.gl_id', 'ASC');
		return $this->db->get()->result_array();
	}
	public function get_row_jurnal($y, $m)
	{
		$this->db->select('a.gl_ref,count(a.gl_ref) as row,date(a.gl_date) as gl_date')
			->from('general_ledger as a')
			->where('month(a.gl_date)', $m)
			->where('year(a.gl_date)', $y)
			->group_by('a.gl_ref')
			->group_by('date(a.gl_date)')
			->order_by('date(a.gl_date)', 'ASC');
		return $this->db->get()->result_array();
	}
	public function opening_balance1($y, $m, $a)
	{
		$this->db->select("a.account_no,b.account_name,sum(IF( a.gl_balance = 'd', a.gl_nominal, 0)) AS debet,sum(IF( a.gl_balance = 'k', a.gl_nominal, 0)) AS kredit,b.normal_balance")
			->from('chart_of_account as b')
			->join('general_ledger as a', 'a.account_no=b.account_no')
			->where('b.account_name', $a)
			->where('month(a.gl_date) <', $m)
			->where('year(a.gl_date) ', $y)
			->group_by('a.account_no');
		return $this->db->get()->row();
	}
	public function opening_balance2($y, $a)
	{
		$this->db->select("a.account_no,b.account_name,sum(IF( a.gl_balance = 'd', a.gl_nominal, 0)) AS debet,sum(IF( a.gl_balance = 'k', a.gl_nominal, 0)) AS kredit,b.normal_balance")
			->from('chart_of_account as b')
			->join('general_ledger as a', 'a.account_no=b.account_no')
			->where('b.account_name', $a)
			->where('year(a.gl_date) <', $y)
			->group_by('a.account_no');
		return $this->db->get()->row();
	}
	public function first_balance($y, $m, $a)
	{
		$db = $this->db->query("SELECT 
		tb_mutasi.sub_code as header,
		tb_mutasi.account_no as kode_akun,
		tb_mutasi.account_name as nama_akun,
		tb_opening1.opening_debet + tb_opening2.opening_debet as debet,
		tb_opening1.opening_kredit + tb_opening2.opening_kredit as kredit,
		tb_mutasi.mutasi_debet,
		tb_mutasi.mutasi_kredit,
		tb_mutasi.normal_balance
		FROM (
				SELECT 
				a.sub_code,
				a.account_no,
				a.account_name,
				SUM(IF(b.gl_balance = 'd',b.gl_nominal,0)) as mutasi_debet,
				SUM(IF(b.gl_balance = 'k',b.gl_nominal,0)) as mutasi_kredit,
					a.normal_balance
			FROM chart_of_account as a 
			LEFT OUTER JOIN general_ledger as b 
			ON a.account_no=b.account_no AND month(b.gl_date) = $m AND year(b.gl_date) = $y
			GROUP BY a.account_no
			) as tb_mutasi
			JOIN (
					SELECT 
					a.sub_code,
					a.account_no,
					a.account_name,
					SUM(IF(b.gl_balance = 'd',b.gl_nominal,0)) as opening_debet,
					SUM(IF(b.gl_balance = 'k',b.gl_nominal,0)) as opening_kredit
				FROM chart_of_account as a 
				LEFT OUTER JOIN general_ledger as b 
				ON a.account_no=b.account_no AND month(b.gl_date) < $m AND year(b.gl_date) = $y
				GROUP BY a.account_no
				) as tb_opening1
			ON tb_mutasi.account_no=tb_opening1.account_no
			JOIN (
					SELECT 
					a.sub_code,
					a.account_no,
					a.account_name,
					SUM(IF(b.gl_balance = 'd',b.gl_nominal,0)) as opening_debet,
					SUM(IF(b.gl_balance = 'k',b.gl_nominal,0)) as opening_kredit
				FROM chart_of_account as a 
				LEFT OUTER JOIN general_ledger as b 
				ON a.account_no=b.account_no AND  year(b.gl_date) < $y
				GROUP BY a.account_no
				) as tb_opening2
		ON tb_mutasi.account_no=tb_opening2.account_no
		WHERE tb_mutasi.account_name = '$a'
		GROUP BY tb_mutasi.account_no")->row_array();

		return $db;
	}
	public function all($y, $m, $a)
	{
		$this->db->select("a.gl_date,a.account_no,b.account_name,a.gl_ref,IF( a.gl_balance = 'd', a.gl_nominal, 0) AS debet,IF( a.gl_balance = 'k', a.gl_nominal, 0) AS kredit,b.normal_balance")
			->from('general_ledger as a')
			->join('chart_of_account as b', 'a.account_no=b.account_no')
			->where('b.account_name', $a)
			->where('month(a.gl_date)', $m)
			->where('year(a.gl_date)', $y)
			->order_by('a.gl_date', 'ASC');

		return $this->db->get()->result_array();
	}
}

/* End of file M_ledger.php */
