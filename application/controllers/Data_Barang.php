<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_data_barang');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{

		$data['data_barang'] = $this->m_data_barang->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Data Barang';
		$this->load->view('data_barang/index', $data);
	}

	public function add()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Tambah Data Barang';
		$this->load->view('data_barang/add', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim', ['required' => 'Kode Barang Harus Di Isi!']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', ['required' => 'Nama Barang Harus Di Isi!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', ['required' => 'Satuan Harus Di Isi!']);
		$this->form_validation->set_rules('harga_masuk', 'Harga Masuk', 'required|trim', ['required' => 'Harga Masuk Harus Di Isi!']);
		$this->form_validation->set_rules('harga_keluar', 'Harga Keluar', 'required|trim', ['required' => 'Harga Keluar Harus Di Isi!']);
		$this->form_validation->set_rules('pemasok', 'Pemasok', 'required|trim', ['required' => 'Pemasok Harus Di Isi!']);

		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$pemasok     = $this->input->post('pemasok');
		$satuan      = $this->input->post('satuan');
		$harga_masuk = $this->input->post('harga_masuk');


		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('data_barang/add');
		} else {
			$data = array(
				'kode_barang' => $kode_barang,
				'nama_barang' => $nama_barang,
				'pemasok'     => $pemasok,
				'satuan'      => $satuan,
				'harga_masuk' => $harga_masuk,
			);

			$this->m_data_barang->input_data($data, 'data_barang');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('data_barang');
		}
	}

	public function edit($id_data_barang)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_data_barang' => $id_data_barang);
		$data['title'] = 'Edit Data Barang';
		$data['data_barang'] = $this->m_data_barang->edit_data($where, 'data_barang')->row();
		$this->load->view('data_barang/edit', $data);
	}

	public function aksi_edit()
	{
		$id_data_barang  = $this->input->post('id_data_barang');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$pemasok     = $this->input->post('pemasok');
		$satuan      = $this->input->post('satuan');
		$harga_masuk = $this->input->post('harga_masuk');

		$data = array(
			'kode_barang' => $kode_barang,
			'nama_barang' => $nama_barang,
			'pemasok'     => $pemasok,
			'satuan'      => $satuan,
			'harga_masuk' => $harga_masuk,

		);
		$where = array(
			'id_data_barang' => $id_data_barang
		);

		$this->m_data_barang->update($where, $data, 'data_barang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Edit!</div>');
		redirect('data_barang');
	}

	public function hapus($id_data_barang)
	{
		$where = array('id_data_barang' => $id_data_barang);
		$this->m_data_barang->hapus_data($where, 'data_barang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('data_barang');
	}
}
