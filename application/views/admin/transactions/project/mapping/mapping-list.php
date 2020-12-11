<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<a href="<?= site_url('transaksi/pemetaan/baru') ?>" class="btn btn-outline-primary mb-4 mt-4">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
						<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
						<line x1="12" y1="8" x2="12" y2="16"></line>
						<line x1="8" y1="12" x2="16" y2="12"></line>
					</svg>
					Buat Pemetaan Baru</a>
				<div class="widget-content widget-content-area br-6">
					<h3>Daftar Pemetaan Proyek</h3>
					<?php if ($this->session->flashdata()) : ?>
						<?php if ($this->session->flashdata('success')) : ?>
							<div class="alert alert-success" role="alert">
								<?= $this->session->flashdata('success');
								?>
							</div>
						<?php endif ?>
						<?php if ($this->session->flashdata('error')) : ?>
							<div class="alert alert-danger" role="alert">
								<?= $this->session->flashdata('error');
								?>
							</div>
						<?php endif ?>
					<?php endif ?>
					<div class="table-responsive mb-4 mt-4">
						<table id="zero-config" class="table table-hover" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Pemetaan</th>
									<th>Jenis Proyek</th>
									<th>Keterangan</th>
									<th class="no-content"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($all as $row) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $row['trans_id'] ?></td>
										<td><?= $row['t_project_name'] . ' ' . $row['type'] ?></td>
										<td><?= $row['description'] ?></td>
										<td>
											<a href="<?= site_url('transaksi/pemetaan/detail/' . $row['trans_id']) ?>" class="text-info mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
													<line x1="8" y1="6" x2="21" y2="6"></line>
													<line x1="8" y1="12" x2="21" y2="12"></line>
													<line x1="8" y1="18" x2="21" y2="18"></line>
													<line x1="3" y1="6" x2="3.01" y2="6"></line>
													<line x1="3" y1="12" x2="3.01" y2="12"></line>
													<line x1="3" y1="18" x2="3.01" y2="18"></line>
												</svg>
											</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of main content -->

	<!-- Modal add type of project -->
	<div class="modal fade" id="addProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Proyek</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('Master/proyek/store') ?>" method="POST" class="needs-validation" novalidate>
					<div class="modal-body">
						<div class="form-group">
							<label>Kode Kategori</label>
							<input type="text" value="AUTO" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label>Nama Jenis Proyek</label>
							<input type="text" class="form-control" name="t_project_name" required>
						</div>
						<div class="form-group">
							<label>Estimasi Penyelesaian</label>
							<input type="number" class="form-control" name="t_project_estimation" min="1" required>
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="text" class="form-control" name="t_project_price" data-type="currency" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
						<button type="sumbit" class="btn btn-primary">Tambahkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
	</script>
	<?php $this->load->view('_partials/footer') ?>
