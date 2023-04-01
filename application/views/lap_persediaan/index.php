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
			<h6 class="m-0 font-weight-bold text-primary">Laporan Persediaan</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('lap_persediaan/cetak'); ?>" class="btn btn-sm btn-warning ml-2"><i class="fas fa-plus fa-sm"></i> Cetak</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Tahun</th>
							<th>Safety Stock</th>
							<th>Persediaan Minimum</th>
							<th>Persediaan Maksium</th>
							<th>Reorder Point</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($laporan_persediaan as $key) { ?>
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