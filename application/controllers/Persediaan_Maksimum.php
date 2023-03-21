<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Persediaan_Maksimum extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_persediaan_maksimum');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['persediaan_maksimum'] = $this->m_persediaan_maksimum->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Persediaan Maksimum';
		$this->load->view('persediaan_maksimum/index', $data);
	}
}
