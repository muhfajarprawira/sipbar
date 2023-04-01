<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-dark float-left font-weight-bold">Tambah Data Pemasok</h5>
		<a href="<?= base_url('pemasok'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<div class=" row">
				<div class="col-md-6">
					<form action="<?= base_url('pemasok/add_data_action'); ?>" method="post">
						<?php if ($this->session->flashdata('message')) : ?>
							<div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
						<?php endif ?>
						<div class="form-group">
							<label for="text">Kode Pemasok</label>
							<input type="text" name="kode_pemasok" id="kode_pemasok" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Nama Pemasok</label>
							<input type="text" name="nama_pemasok" class="form-control">
						</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="text">Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>

					<div class="form-group">
						<label>No Hp</label>
						<input type="text" name="no_hp" class="form-control">
					</div>
				</div>
			</div>

			<!-- <div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
					<br>
					<div class="form-group">
						<label for="text">Tempat Lahir</label>
						<input type="text" name="tempat_lahir" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>

					<div class="form-group">
						<label>Status Pasien</label>
						<select name="status_pasien" class="form-control">
							<option>-- Pilih --</option>
							<option>UMUM</option>
							<option>BPJS</option>
						</select> -->
			<div class="justify-content-center align-items-center">
				<button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
			</div>
			</form>

		</div>
	</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>