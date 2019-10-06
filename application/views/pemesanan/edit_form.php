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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('pemesanan/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('pemesanan/edit') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_pemesanan" value="<?php echo $pemesanan->id_pemesanan?>" />
<?php
// Cek role user
if($this->session->userdata('level') == 'kasir'){ // Jika role-nya admin
    ?>

							
							<div class="form-group">
								<label for="name">Kode Barang*</label>
								<input class="form-control <?php echo form_error('kode_pemesanan') ? 'is-invalid':'' ?>"
								 type="text" name="kode_pemesanan" placeholder="Kode pemesanan" value="<?php echo $pemesanan->kode_pemesanan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_pemesanan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">No Meja*</label>
								<input class="form-control <?php echo form_error('no_meja') ? 'is-invalid':'' ?>"
								 type="text" name="no_meja" placeholder="No Meja" value="<?php echo $pemesanan->no_meja ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('no_meja') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Total Tagihan</label>
								<input class="form-control <?php echo form_error('total_tagihan') ? 'is-invalid':'' ?>"
								 type="number" name="total_tagihan" min="0" placeholder="Total Tagihan" value="<?php echo $pemesanan->total_tagihan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('total_tagihan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Status*</label>
								<input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
								 type="text" name="status" placeholder="Status Produk" value="<?php echo $pemesanan->status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>
   <?php
}else{ // Jika role-nya operator
    ?>

							
							<div class="form-group">
								<label for="name">Kode Barang*</label>
								<input class="form-control <?php echo form_error('kode_pemesanan') ? 'is-invalid':'' ?>"
								 type="text" name="kode_pemesanan" placeholder="Kode pemesanan" value="<?php echo $pemesanan->kode_pemesanan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_pemesanan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">No Meja*</label>
								<input class="form-control <?php echo form_error('no_meja') ? 'is-invalid':'' ?>"
								 type="text" name="no_meja" placeholder="No Meja" value="<?php echo $pemesanan->no_meja ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('no_meja') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Total Tagihan</label>
								<input class="form-control <?php echo form_error('total_tagihan') ? 'is-invalid':'' ?>"
								 type="number" name="total_tagihan" min="0" placeholder="Total Tagihan" value="<?php echo $pemesanan->total_tagihan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('total_tagihan') ?>
								</div>
							</div>

							<div class="form-group">
								<input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
								 type="hidden" name="status" placeholder="Status Produk" value="<?php echo $pemesanan->status ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>

    <?php
}
?>
							
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("_partials/js.php") ?>

</body>

</html>