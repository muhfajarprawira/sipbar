<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left font-weight-bold">Tambah Persediaan</h5>
		<a href="<?= base_url('persediaan'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<div class=" row">
				<div class="col-md-6">
					<form action="<?= base_url('persediaan/hitung_jumlah'); ?>" method="post">
						<?php if ($this->session->flashdata('message')) : ?>
							<div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
						<?php endif ?>
						<div class="form-group">
							<label for="text">Kode Persediaan</label>
							<input type="text" name="kode_persediaan" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Pilih Barang</label>
							<select name="nama_barang" class="form-control">
								<?php
								foreach ($data_barang as $key) { ?>
									<option><?= $key->kode_barang; ?> - <?= $key->nama_barang; ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label for="text">Tahun</label>
							<input type="number" name="tahun" class="form-control">
						</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<label for="text">Pemakaian Maksimum</label>
						<input type="text" name="pemakaian_maksimum" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Pemakaian Rata-Rata</label>
						<input type="text" name="pemakaian_rata_rata" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Lead Time</label>
						<input type="text" name="lead_time" class="form-control">
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