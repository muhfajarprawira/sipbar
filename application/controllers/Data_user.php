<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email Ini Sudah Terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {

			$data['title'] = 'Tambah Data User';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('user/add', $data);
		} else {
			$data = [
				'name'         => htmlspecialchars($this->input->post('name', true)),
				'email'        => htmlspecialchars($this->input->post('email', true)),
				'image'        => 'default.jpg',
				'password'     => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'      => 2,
				'is_active'    => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah!</div>');
			redirect('user/index');
		}
	}
}
