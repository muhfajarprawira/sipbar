<!-- Begin Page Content -->
<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<div class="container-fluid">
	<!-- table -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Laporan Barang Masuk</h6>
		</div><br>


		<form action="" method=""></form>
		<div class="container align-items-center">
			<form action="">
				<div class="row">
					<div class="col form-group">
						<label for="inputMulaiTanggal" class="font-weight-bold">Mulai Tanggal :</label>
						<input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control" name="tgl_pemasukan" required>
					</div>
					<div class="col form-group">
						<label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
						<input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control" name="tgl_pemasukan" required>
					</div>
				</div>
				<button type="submit" class="btn btn-success">Tampilkan</button>
			</form>
		</div>
		<br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('lap_barang_masuk/cetak'); ?>" class="btn btn-sm btn-warning ml-2"><i class="fas fa-print fa-sm"></i> Cetak</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Tanggal Masuk</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Nama Pemasok</th>
							<th>Satuan</th>
							<th>Harga</th>
							<th>Jumlah Masuk</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($laporan_barang_masuk as $key) { ?>
							<tr class="text_center">
								<td><?= $no++; ?></td>
								<td><?= $key->id_data_barang; ?></td>
								<td><?= $key->id_barang_masuk; ?></td>
								<td><?= $key->id_barang_keluar; ?></td>
								<td><?= $key->tgl_masuk; ?></td>
								<td><?= $key->tgl_keluar; ?></td>
								<td><?= $key->persediaan; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<?php
$this->load->view('templates/footer');
?>
<!-- End of Main Content -->