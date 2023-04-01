<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Persediaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_persediaan');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

		if (!isset($this->session->userdata['email'])) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Belum Login!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data['persediaan'] = $this->m_persediaan->tampil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Persediaan';
		$this->load->view('persediaan/index', $data);
	}

	public function add()
	{
		$data['data_barang'] = $this->m_persediaan->pilih_barang()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Tambah Data Safety Stock';
		$this->load->view('persediaan/add', $data);
	}
	public function hitung_jumlah()
	{
		$this->form_validation->set_rules('kode_persediaan', 'Kode Safety  Stock', 'required|trim', ['required' => 'Kode Safety Stock Harus Di Isi!']);
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', ['required' => 'Nama Barang Harus Di Isi!']);
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', ['required' => 'Tahun Harus Di Isi!']);
		$this->form_validation->set_rules('pemakaian_maksimum', 'Pemakaian Maksimum', 'required|trim', ['required' => 'Pemakaian Maksimum Harus Di Isi!']);
		$this->form_validation->set_rules('pemakaian_rata_rata', 'Pemakaian Rata-Rata', 'required|trim', ['required' => 'Pemakaian Rata - Rata Harus Di Isi!']);
		$this->form_validation->set_rules('lead_time', 'Lead Time', 'required|trim', ['required' => 'Lead Time Harus Di Isi!']);

		$kode_persediaan 	 = $this->input->post('kode_persediaan');
		$nama_barang         = $this->input->post('nama_barang');
		$tahun       				 = $this->input->post('tahun');
		$pemakaian_maksimum  = $this->input->post('pemakaian_maksimum');
		$pemakaian_rata_rata = $this->input->post('pemakaian_rata_rata');
		$lead_time           = $this->input->post('lead_time');
		$safety_stock       = ($pemakaian_maksimum - $pemakaian_rata_rata) * $lead_time;
		$min_stock           = ($pemakaian_rata_rata * $lead_time) + $safety_stock;
		$max_stock           = 2 * ($pemakaian_rata_rata * $lead_time);
		$reorder_point       = ($max_stock - $min_stock);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', validation_errors());
			redirect('persediaan');
		} else {
			$data = array(
				'kode_persediaan'     => $kode_persediaan,
				'nama_barang'         => $nama_barang,
				'tahun'               => $tahun,
				'pemakaian_maksimum'  => $pemakaian_maksimum,
				'pemakaian_rata_rata' => $pemakaian_rata_rata,
				'lead_time'           => $lead_time,
				'safety_stock'				=> $safety_stock,
				'min_stock'				    => $min_stock,
				'max_stock'				    => $max_stock,
				'reorder_point'				=> $reorder_point,
			);
			$this->m_persediaan->input_data($data, 'persediaan');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Tambah!</div>');
			redirect('persediaan');
		}
	}
}
