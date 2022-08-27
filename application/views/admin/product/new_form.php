<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Price*</label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="price" min="0" placeholder="Product price" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Description*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="Product description..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="kategori">Kategori*</label>
								<select class="form-control <?php echo form_error('kategori') ? 'is-invalid':'' ?>" name="id_kategori_barang" placeholder="Kategori" />
									<?php
										foreach ($kategorii as $kat) {
											echo '<option value = ' . $kat->id_kategori_barang . '>' . $kat->kategori . ' </option>';
									        }
									?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('kategori') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="merk">Merk*</label>
								<select class="form-control <?php echo form_error('merk') ? 'is-invalid':'' ?>"
								 type="text" name="id_merk_barang" placeholder="merk" />
									<?php
										foreach ($merkk as $mer) {
											echo '<option value = ' . $mer->id_merk_barang . '>' . $mer->merk . ' </option>';
									        }
									?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('merk') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="supplier">Supplier*</label>
								<select class="form-control <?php echo form_error('supplier') ? 'is-invalid':'' ?>"
								 type="text" name="id_supplier_barang" min="0" placeholder="supplier" />
									<?php
										foreach ($supplierr as $sup) {
											echo '<option value = ' . $sup->id_supplier_barang . '>' . $sup->supplier . ' </option>';
									        }
									?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('supplier') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="stok">Stok*</label>
								<input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
								 type="number" name="stok" min="0" placeholder="stok" />
								<div class="invalid-feedback">
									<?php echo form_error('stok') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="satuan">Satuan*</label>
								<input class="form-control <?php echo form_error('Satuan') ? 'is-invalid':'' ?>"
								 type="text" name="satuan" min="0" placeholder="Satuan" />
								<div class="invalid-feedback">
									<?php echo form_error('satuan') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
