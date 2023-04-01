<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang_Keluar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_barang_keluar');
		$this->load->helper('url');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['barang_keluar'] = $this->m_barang_keluar->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Barang Keluar';
		$this->load->view('barang_keluar/index', $data);
	}

	public function add()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data Barang Keluar';
		$this->load->view('barang_keluar/add', $data);
	}

	public function tambah_data_action()
	{
		$this->form_validation->set_rules('kode_barang_keluar', 'Kode Barang', 'required|trim', ['required' => 'Kode Barang Harus Di Isi!']);
		$this->form_validation->set_rules('tgl_keluar', 'Tanggal keluar', 'required|trim', ['required' => 'Tanggal keluar Harus Di Isi!']);
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim', ['required' => 'Kode Barang Harus Di Isi!']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', ['required' => 'Nama Barang Harus Di Isi!']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', ['required' => 'Satuan Harus Di Isi!']);
		$this->form_validation->set_rules('jumlah_keluar', 'Jumlah Keluar', 'required|trim', ['required' => 'Jumlah Harus Di Isi!']);

		$kode_barang_keluar = $this->input->post('kode_barang_keluar');
		$tgl_keluar         = $this->input->post('tgl_keluar');
		$kode_barang        = $this->input->post('kode_barang');
		$nama_barang        = $this->input->post('nama_barang');
		$kode_pemasok       = $this->input->post('kode_pemasok');
		$pemasok            = $this->input->post('pemasok');
		$satuan             = $this->input->post('satuan');
		$jumlah_keluar      = $this->input->post('jumlah_keluar');


		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('barang_keluar');
		} else {
			$data = array(
				'kode_barang_keluar' => $kode_barang_keluar,
				'tgl_keluar'         => $tgl_keluar,
				'kode_barang'        => $kode_barang,
				'nama_barang'        => $nama_barang,
				'kode_pemasok'       => $kode_pemasok,
				'pemasok'            => $pemasok,
				'satuan'             => $satuan,
				'jumlah_keluar'      => $jumlah_keluar,
			);
			$this->m_barang_keluar->input_data($data, 'barang_keluar');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambah!</div>');
			redirect('barang_keluar');
		}
	}

	public function edit($id_barang_keluar)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_barang_keluar' => $id_barang_keluar);
		$data['title'] = 'Edit Data Barang Keluar';
		$data['barang_keluar'] = $this->m_barang_keluar->edit_data($where, 'barang_keluar')->row();
		$this->load->view('barang_keluar/edit', $data);
	}

	public function aksi_edit()
	{
		$id_barang_keluar   = $this->input->post('id_barang_keluar');
		$kode_barang_keluar = $this->input->post('kode_barang_keluar');
		$tgl_keluar         = $this->input->post('tgl_keluar');
		$kode_barang        = $this->input->post('kode_barang');
		$nama_barang        = $this->input->post('nama_barang');
		$kode_pemasok       = $this->input->post('kode_pemasok');
		$pemasok            = $this->input->post('pemasok');
		$satuan             = $this->input->post('satuan');
		$jumlah_keluar      = $this->input->post('jumlah_keluar');

		$data = array(
			'kode_barang_keluar' => $kode_barang_keluar,
			'tgl_keluar'         => $tgl_keluar,
			'kode_barang'        => $kode_barang,
			'nama_barang'        => $nama_barang,
			'kode_pemasok'       => $kode_pemasok,
			'pemasok'            => $pemasok,
			'satuan'             => $satuan,
			'jumlah_keluar'      => $jumlah_keluar,
		);

		$where = array(
			'id_barang_keluar' => $id_barang_keluar
		);

		$this->m_barang_keluar->update($where, $data, 'barang_keluar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah!</div>');
		redirect('barang_keluar');
	}

	public function hapus($id_barang_keluar)
	{
		$where = array('id_barang_keluar' => $id_barang_keluar);
		$this->m_barang_keluar->hapus_data($where, 'barang_keluar');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus!</div>');
		redirect('barang_keluar');
	}
}
