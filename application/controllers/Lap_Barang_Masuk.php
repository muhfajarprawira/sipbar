<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lap_Barang_Masuk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_lap_barang_masuk');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['laporan_barang_masuk'] = $this->m_lap_barang_masuk->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Laporan Barang Masuk';
		$this->load->view('lap_barang_masuk/index', $data);
	}
}
