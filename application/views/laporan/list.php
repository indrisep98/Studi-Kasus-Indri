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
				<h2> Data Makanan dan Minuman </h2>
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('produk/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Nama</th>
										<th>Harga</th>
										<th>Gambar</th>
										<th>Deskripsi</th>
										<th>Jenis</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($produk as $produk): ?>
									<tr>
										<td>
											<?php echo $produk->kode_barang ?>
										</td>
										<td width="150">
											<?php echo $produk->nama ?>
										</td>
										<td>
											<?php echo $produk->harga ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/produk/'.$produk->gambar) ?>" width="64" />
										</td>
										<td class="small">
											<?php echo substr($produk->deskripsi, 0, 120) ?>...</td>
										<td>
											<?php echo $produk->jenis ?>
										</td>
										<td>
											<?php echo $produk->status ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('produk/edit/'.$produk->id_produk) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('produk/delete/'.$produk->id_produk) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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