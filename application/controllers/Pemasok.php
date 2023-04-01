<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemasok extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_pemasok');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['pemasok'] = $this->m_pemasok->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Pemasok';
		$this->load->view('pemasok/index', $data);
	}

	public function add()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data Pemasok';
		$this->load->view('pemasok/add', $data);
	}

	public function add_data_action()
	{
		$this->form_validation->set_rules('kode_pemasok', ' Kode Pemasok', 'required|trim', ['required' => 'Kode Pemasok Harus Di Isi!']);
		$this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required|trim', ['required' => 'Nama Pemasok Harus Di Isi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Di Isi!']);
		$this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim', ['required' => 'No Hp Harus Di Isi!']);

		$kode_pemasok = $this->input->post('kode_pemasok');
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat       = $this->input->post('alamat');
		$no_hp        = $this->input->post('no_hp');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('pemasok/add');
		} else {
			$data = array(
				'kode_pemasok' => $kode_pemasok,
				'nama_pemasok' => $nama_pemasok,
				'alamat'       => $alamat,
				'no_hp'        => $no_hp,
			);
			$this->m_pemasok->input_data($data, 'pemasok');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('pemasok');
		}
	}

	public function edit($id_pemasok)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_pemasok' => $id_pemasok);
		$data['title'] = 'Edit Data Pemasok';
		$data['pemasok'] = $this->m_pemasok->edit_data($where, 'pemasok')->row();
		$this->load->view('pemasok/edit', $data);
	}

	public function aksi_edit()
	{
		$this->form_validation->set_rules('kode_pemasok', ' Kode Pemasok', 'required|trim', ['required' => 'Kode Pemasok Harus Di Isi!']);
		$this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required|trim', ['required' => 'Nama Pemasok Harus Di Isi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Di Isi!']);
		$this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim', ['required' => 'No Hp Harus Di Isi!']);

		$id_pemasok   = $this->input->post('id_pemasok');
		$kode_pemasok = $this->input->post('kode_pemasok');
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat       = $this->input->post('alamat');
		$no_hp        = $this->input->post('no_hp');

		$data = array(
			'kode_pemasok' => $kode_pemasok,
			'nama_pemasok' => $nama_pemasok,
			'alamat'       => $alamat,
			'no_hp'        => $no_hp
		);
		$where = array(
			'id_pemasok' => $id_pemasok
		);

		$this->m_pemasok->update($where, $data, 'pemasok');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Edit!</div>');
		redirect('pemasok');
	}

	public function hapus($id_pemasok)
	{
		$where = array('id_pemasok' => $id_pemasok);
		$this->m_pemasok->hapus_data($where, 'pemasok');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('pemasok');
	}
}
