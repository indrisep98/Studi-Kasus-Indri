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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('pemesanan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('pemesanan/add') ?>" method="post" enctype="multipart/form-data" >
							<?php
// Cek role user
if($this->session->userdata('level') == 'kasir'){ // Jika role-nya admin
    ?>
							<div class="form-group">
								<label for="name">Kode Pemesanan</label>
								<input class="form-control <?php echo form_error('kode_pemesanan') ? 'is-invalid':'' ?>"
								 type="text" name="kode_pemesanan" placeholder="Kode Pemesanan" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_pemesanan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">No Meja*</label>
								<input class="form-control <?php echo form_error('no_meja') ? 'is-invalid':'' ?>"
								 type="text" name="no_meja" placeholder="Nomor Meja" />
								<div class="invalid-feedback">
									<?php echo form_error('no_meja') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Total Tagihan*</label>
								<input class="form-control <?php echo form_error('total_tagihan') ? 'is-invalid':'' ?>"
								 type="number" name="total_tagihan" min="0" placeholder="Total Tagihan" />
								<div class="invalid-feedback">
									<?php echo form_error('total_tagihan') ?>
								</div>
							</div>

							
    						<div class="form-group">
								<label for="name">Status*</label>
								 <select name="status" class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" required>
                          			 <option value="status">-- Pilih --</option>
                         			 <option>Selesai</option>
                          			 <option>Belum Selesai</option>
                       				 </select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
					</div>
					<div class="card-footer small text-muted">
						* required fields
					</div>
   <?php
}else{ // Jika role-nya operator
    ?>

							<div class="form-group">
								<label for="name">Kode Pemesanan</label>
								<input class="form-control <?php echo form_error('kode_pemesanan') ? 'is-invalid':'' ?>"
								 type="text" name="kode_pemesanan" placeholder="Kode Pemesanan" value="ERP<?php echo sprintf("%04s", $kode_pemesanan) ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('kode_pemesanan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">No Meja*</label>
								<input class="form-control <?php echo form_error('no_meja') ? 'is-invalid':'' ?>"
								 type="text" name="no_meja" placeholder="Nomor Meja" />
								<div class="invalid-feedback">
									<?php echo form_error('no_meja') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Total Tagihan*</label>
								<input class="form-control <?php echo form_error('total_tagihan') ? 'is-invalid':'' ?>"
								 type="number" name="total_tagihan" min="0" placeholder="Total Tagihan" />
								<div class="invalid-feedback">
									<?php echo form_error('total_tagihan') ?>
								</div>
							</div>

							
    							<div class="form-group">
								<label for="name">Status*</label>
								 <select name="status" class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" required>
                          			 <option value="status">-- Pilih --</option>
                          			 <option>Belum Selesai</option>
                       				 </select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
					</div>


    <?php
}
?>
					


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