<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left font-weight-bold">Ubah Data Barang</h5>
		<a href="<?= base_url('data_barang'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>

	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<form action="<?= base_url('data_barang/aksi_edit'); ?>" method="post">
						<div class="form-group">
							<label for="text">Kode Barang</label>
							<input type="text" name="kode_barang" value="<?= $data_barang->kode_barang; ?>" class="form-control">
							<input type="hidden" name="id_data_barang" value="<?= $data_barang->id_data_barang; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Nama Barang</label>
							<input type="text" name="nama_barang" value="<?= $data_barang->nama_barang; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Pemasok</label>
							<input type="text" name="pemasok" value="<?= $data_barang->pemasok; ?>" class="form-control">
						</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="text">Satuan</label>
						<input type="text" name="satuan" value="<?= $data_barang->satuan; ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Harga Masuk</label>
						<input type="text" name="harga_masuk" value="<?= $data_barang->harga_masuk; ?>" class="form-control">
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