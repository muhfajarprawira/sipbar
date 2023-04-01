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
			<h6 class="m-0 font-weight-bold text-primary">Data Pemasok</h6>
		</div><br>
		<div class="col-sm-4 justify-content-end"><a href="<?= base_url('pemasok/add'); ?>" class="btn btn-sm btn-primary ml-2"><i class="fas fa-plus fa-sm"></i> Tambah</a></div>
		<div class="card-body">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>No.</th>
							<th>Kode Pemasok</th>
							<th>Nama Pemasok</th>
							<th>Alamat</th>
							<th>No Hp</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pemasok as $key) { ?>
							<tr class="text-center">
								<td><?= $no++; ?></td>
								<td><?= $key->kode_pemasok; ?></td>
								<td><?= $key->nama_pemasok; ?></td>
								<td><?= $key->alamat; ?></td>
								<td><?= $key->no_hp; ?></td>
								<td>
									<a href="<?= site_url('pemasok/edit/' . $key->id_pemasok); ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('Hapus Data?');" href="<?= site_url('pemasok/hapus/' . $key->id_pemasok); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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