<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<h2> Data Pemesanan </h2>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('pemesanan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode Pemesanan</th>
										<th>No.Meja</th>
										<th>Total Tagihan</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pemesanan as $pemesanan): ?>
									<tr>
										<td width="150">
											<?php echo $pemesanan->kode_pemesanan ?>
										</td>
										<td>
											<?php echo $pemesanan->no_meja ?>
										</td>
										<td>
											<?php echo $pemesanan->total_tagihan ?>
										</td>
										<td>
											<?php echo $pemesanan->status ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('pemesanan/edit/'.$pemesanan->id_pemesanan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('pemesanan/delete/'.$pemesanan->id_pemesanan) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Delete</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("_partials/scrolltop.php") ?>
	<?php $this->load->view("_partials/modal.php") ?>

	<?php $this->load->view("_partials/js.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
</body>

</html>