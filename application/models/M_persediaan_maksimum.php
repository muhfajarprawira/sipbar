<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_persediaan_maksimum extends CI_model
{

	function tampil_data()
	{
		return $this->db->get('persediaan_maksimum');
	}

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}