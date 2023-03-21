<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang_Masuk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_barang_masuk');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['barang_masuk'] = $this->m_barang_masuk->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Barang Masuk';
		$this->load->view('barang_masuk/index', $data);
	}

	public function add()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data Barang Masuk';
		$this->load->view('barang_masuk/add', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('kode_barang_masuk', 'Kode Barang', 'required|trim', ['required' => 'Kode Barang Harus Di Isi!']);
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required|trim', ['required' => 'Tanggal Masuk Harus Di Isi!']);
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim', ['required' => 'Kode Barang Harus Di Isi!']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', ['required' => 'Nama Barang Harus Di Isi!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', ['required' => 'Satuan Harus Di Isi!']);
		$this->form_validation->set_rules('kode_pemasok', 'Kode Pemasok', 'required|trim', ['required' => 'Kode Pemasok Harus Di Isi!']);
		$this->form_validation->set_rules('nama_pemasok', 'Nama Pemasok', 'required|trim', ['required' => 'Nama Pemasok Harus Di Isi!']);
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim', ['required' => 'Jumlah Harus Di Isi!']);
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|trim', ['required' => 'Total Harga Harus Di Isi!']);

		$kode_barang_masuk = $this->input->post('kode_barang_masuk');
		$tgl_masuk         = $this->input->post('tgl_masuk');
		$kode_barang       = $this->input->post('kode_barang');
		$nama_barang       = $this->input->post('nama_barang');
		$satuan            = $this->input->post('satuan');
		$kode_pemasok      = $this->input->post('kode_pemasok');
		$nama_pemasok      = $this->input->post('nama_pemasok');
		$jumlah            = $this->input->post('jumlah');
		$total_harga       = $this->input->post('total_harga');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('barang_masuk');
		} else {
			$data = array(
				'kode_barang_masuk' => $kode_barang_masuk,
				'tgl_masuk'         => $tgl_masuk,
				'kode_barang'       => $kode_barang,
				'nama_barang'       => $nama_barang,
				'satuan'            => $satuan,
				'kode_pemasok'      => $kode_pemasok,
				'nama_pemasok'      => $nama_pemasok,
				'jumlah'            => $jumlah,
				'total_harga'       => $total_harga,
			);
			$this->m_barang_masuk->input_data($data, 'barang_masuk');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambah!</div>');
			redirect('barang_masuk');
		}
	}

	public function edit($id_barang_masuk)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_barang_masuk' => $id_barang_masuk);
		$data['title'] = 'Edit Data Barang Masuk';
		$data['barang_masuk'] = $this->m_barang_masuk->edit_data($where, 'barang_masuk')->row();
		$this->load->view('barang_masuk/edit', $data);
	}

	public function aksi_edit()
	{
		$id_barang_masuk   = $this->input->post('id_barang_masuk');
		$kode_barang_masuk = $this->input->post('kode_barang_masuk');
		$tgl_masuk         = $this->input->post('tgl_masuk');
		$kode_barang       = $this->input->post('kode_barang');
		$nama_barang       = $this->input->post('nama_barang');
		$satuan            = $this->input->post('satuan');
		$kode_pemasok      = $this->input->post('kode_pemasok');
		$nama_pemasok      = $this->input->post('nama_pemasok');
		$jumlah            = $this->input->post('jumlah');
		$total_harga       = $this->input->post('total_harga');

		$data = array(
			'kode_barang_masuk' => $kode_barang_masuk,
			'tgl_masuk'         => $tgl_masuk,
			'kode_barang'       => $kode_barang,
			'nama_barang'       => $nama_barang,
			'satuan'            => $satuan,
			'kode_pemasok'      => $kode_pemasok,
			'nama_pemasok'      => $nama_pemasok,
			'jumlah'            => $jumlah,
			'total_harga'       => $total_harga
		);

		$where = array(
			'id_barang_masuk' => $id_barang_masuk
		);

		$this->m_barang_masuk->update($where, $data, 'barang_masuk');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('barang_masuk');
	}

	public function hapus($id_barang_masuk)
	{
		$where = array('id_barang_masuk' => $id_barang_masuk);
		$this->m_barang_masuk->hapus_data($where, 'barang_masuk');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('barang_masuk');
	}
}
