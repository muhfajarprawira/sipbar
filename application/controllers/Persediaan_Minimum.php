<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Persediaan_Minimum extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_persediaan_minimum');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['persediaan_minimum'] = $this->m_persediaan_minimum->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Persediaan Minimum';
		$this->load->view('persediaan_minimum/index', $data);
	}
}
