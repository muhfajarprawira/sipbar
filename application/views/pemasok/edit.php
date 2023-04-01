<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="clearfix">
		<h5 class="h3 mb-4 text-gray-800 float-left font-weight-bold">Edit Data Pemasok</h5>
		<a href="<?= base_url('pemasok'); ?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
	</div>
	<div class="card">
		<div class="card-header">
			<span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<form action="<?= base_url('pemasok/aksi_edit'); ?>" method="post">
						<div class="form-group">
							<label for="text">Kode Pemasok</label>
							<input type="text" name="kode_pemasok" id="kode_pemasok" class="form-control" value="<?= $pemasok->kode_pemasok; ?>">
							<input type="hidden" name="id_pemasok" value="<?= $pemasok->id_pemasok; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label for="text">Nama Pemasok</label>
							<input type="text" name="nama_pemasok" value="<?= $pemasok->nama_pemasok; ?>" class="form-control">
						</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="text">Alamat</label>
						<input type="text" name="alamat" value="<?= $pemasok->alamat; ?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="text">No Hp</label>
						<input type="text" name="no_hp" value="<?= $pemasok->no_hp; ?>" class="form-control">
					</div>
				</div>
			</div>

			<!-- <div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option><?= $pasien->jenis_kelamin; ?></option>
						<option>Laki-Laki</option>
						<option>Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="text">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" value="<?= $pasien->tempat_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" value="<?= $pasien->tanggal_lahir ?>" class="form-control">
				</div>

				<div class="form-group">
					<label for="text">Alamat</label>
					<input type="text" name="alamat" value="<?= $pasien->alamat ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Status Pasien</label>
					<select name="status_pasien" class="form-control">
						<option><?= $pasien->status_pasien; ?></option>
						<option>UMUM</option>
						<option>BPJS</option>
					</select>
				</div> -->
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