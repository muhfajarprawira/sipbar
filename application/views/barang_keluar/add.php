<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left font-weight-bold">Tambah Data Barang Keluar</h5>
		<a href="<?= base_url('barang_keluar'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<div class=" row">
				<div class="col-md-6">
					<form action="<?= base_url('barang_keluar/tambah_data_action'); ?>" method="post">
						<?php if ($this->session->flashdata('message')) : ?>
							<div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
						<?php endif ?>
						<div class="form-group">
							<label for="text">Kode Barang keluar</label>
							<input type="text" name="kode_barang_keluar" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Tanggal keluar</label>
							<input type="date" name="tgl_keluar" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Kode Barang</label>
							<input type="text" name="kode_barang" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control">
						</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="text">Kode Pemasok</label>
						<input type="text" name="kode_pemasok" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Pemasok</label>
						<input type="text" name="pemasok" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Satuan</label>
						<input type="text" name="satuan" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Jumlah Keluar</label>
						<input type="text" name="jumlah_keluar" class="form-control">
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
			<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
		</div>
	</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>