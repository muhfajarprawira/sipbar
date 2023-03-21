<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reorder_Point extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_reorder_point');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['reorder_point'] = $this->m_reorder_point->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Reorder Point';
		$this->load->view('reorder_point/index', $data);
	}
}
