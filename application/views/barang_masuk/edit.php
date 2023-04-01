<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left font-weight-bold">Ubah Data Barang Masuk</h5>
		<a href="<?= base_url('barang_masuk'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<div class=" row">
				<div class="col-md-6">
					<form action="<?= base_url('barang_masuk/aksi_edit'); ?>" method="post">
						<?php if ($this->session->flashdata('message')) : ?>
							<div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
						<?php endif ?>
						<div class="form-group">
							<label for="text">Kode Barang Masuk</label>
							<input type="text" name="kode_barang_masuk" value="<?= $barang_masuk->kode_barang_masuk; ?>" class="form-control">
							<input type="hidden" name="id_barang_masuk" value="<?= $barang_masuk->id_barang_masuk; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Tanggal Masuk</label>
							<input type="date" name="tgl_masuk" value="<?= $barang_masuk->tgl_masuk; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Kode Barang</label>
							<input type="text" name="kode_barang" value="<?= $barang_masuk->kode_barang; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Nama Barang</label>
							<input type="text" name="nama_barang" value="<?= $barang_masuk->nama_barang; ?>" class="form-control">
						</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="text">Satuan</label>
						<input type="text" name="satuan" value="<?= $barang_masuk->satuan; ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Kode Pemasok</label>
						<input type="text" name="kode_pemasok" value="<?= $barang_masuk->kode_pemasok; ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Nama Pemasok</label>
						<input type="text" name="nama_pemasok" value="<?= $barang_masuk->nama_pemasok; ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Jumlah</label>
						<input type="text" name="jumlah" value="<?= $barang_masuk->jumlah; ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Total Harga</label>
						<input type="text" name="total_harga" value="<?= $barang_masuk->total_harga; ?>" class="form-control">
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