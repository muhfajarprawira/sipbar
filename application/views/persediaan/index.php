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
			<h6 class="m-0 font-weight-bold text-primary">Data Safety Stock</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('persediaan/add'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Kode Safety Stock</th>
							<th>Nama Barang</th>
							<th>Tahun</th>
							<th>Pemakaian Maksimum</th>
							<th>Pemakaian Rata-Rata</th>
							<th>Lead Time</th>
							<th>Safety Stock</th>
							<th>Min Stock</th>
							<th>Max Stock</th>
							<th>Reorder Point</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($persediaan as $key) { ?>
							<tr class="text_center">
								<td><?= $no++; ?></td>
								<td><?= $key->kode_persediaan; ?></td>
								<td><?= $key->nama_barang; ?></td>
								<td><?= $key->tahun; ?></td>
								<td><?= $key->pemakaian_maksimum; ?></td>
								<td><?= $key->pemakaian_rata_rata; ?></td>
								<td><?= $key->lead_time; ?></td>
								<td><?= $key->safety_stock; ?></td>
								<td><?= $key->min_stock; ?></td>
								<td><?= $key->max_stock; ?></td>
								<td><?= $key->reorder_point; ?></td>
								<td>
									<a href="<?= site_url('persediaan/edit/' . $key->id_persediaan); ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('persediaan/hapus/' . $key->id_persediaan); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
								</td>
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