<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Safety_Stock extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_safety_stock');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['safety_stock'] = $this->m_safety_stock->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Safety Stock';
		$this->load->view('safety_stock/index', $data);
	}
}
