<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-8 col-lg-8 col-sm-8  layout-spacing">
				<div class="widget-content widget-content-area br-6">
					<h6>Buat Kontrak Baru</h6>
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
					<form action="<?= site_url('transaksi/kontrak/simpan') ?>" method="POST" class="needs-validation" novalidate>
						<div class="row">
							<div class="col-xl-12 col-md-12 col-sm-12 mt-2">
								<label for="">Nama Proyek</label>
								<input type="text" name="project_name" id="project_name" class="form-control" required>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 mt-2">
								<label for="">Luas Bangunan (M<sup>2</sup>)</label>
								<input type="number" name="surface_area" id="surface_area" class="form-control" required>
							</div>

							<div class="col-xl-12 col-md-12 col-sm-12 mt-4">
								<div class="form-group">
									<label for="">Pelanggan</label>
									<select name="client_id" id="client_id" class="form-control" required>
										<option value="">-pilih pelanggan-</option>
										<?php foreach ($clients as $cl) : ?>
											<option value="<?= $cl['client_id'] ?>"><?= '(' . $cl['client_id'] . ') ' . $cl['client_name'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 mt-2">
								<label for="">Jenis Proyek</label>
								<select name="t_project_id" id="t_project_id" class="form-control" required>
									<option value="">-pilih jenis proyek-</option>
									<?php foreach ($type_project as $tp) : ?>
										<option value="<?= $tp['t_project_id'] ?>"><?= '(' . $tp['t_project_id'] . ') ' . $tp['t_project_name'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-xl-6 col-md-6 col-sm-6 mt-2">
								<label for="">Mulai Pengerjaan</label>
								<input type="date" name="project_start" id="project_start" class="form-control" min="<?= date('Y-m-d') ?>" required>
							</div>
							<div class="col-xl-6 col-md-6 col-sm-6 mt-2">
								<label for="">Total Hari Pengerjaan</label>
								<input type="number" name="project_days" id="project_days" class="form-control" min="1" required>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 mt-2">
								<label for="">Metode Pembayaran</label>
								<select name="p_method_id" id="p_method_id" class="form-control" required>
									<option value="">-pilih metode pembayaran-</option>
									<?php foreach ($payment_method as $py) : ?>
										<option value="<?= $py['p_method_id'] ?>"><?= '(' . $py['p_method_id'] . ') ' . $py['p_method_name'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 mt-2">
								<label for="">Nilai Kontrak</label>
								<input type="text" name="total" id="total" class="form-control" data-type="currency" required>
							</div>
							<div class="col-xl-12 col-md-12 col-sm-12 mt-2">
								<label for="">Down Payment (DP)</label>
								<input type="text" name="nominal" id="nominal" class="form-control" data-type="currency" required>
							</div>

							<div class="col-xl-12 col-md-12 col-sm-12 mt-3 text-right">
								<a href="" class="btn btn-danger">Batalkan</a>
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="card">
					<div class="card-body">
						<div class="card-title text-warning">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
								<circle cx="12" cy="12" r="10"></circle>
								<path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
								<line x1="12" y1="17" x2="12.01" y2="17"></line>
							</svg>
							Petunjuk
						</div>
						<ul>
							<li>Down Payment (DP) adalah uang muka pelanggan sesuai dengan perjanjian atau (30%) dari Nilai Kontrak.</li>
							<li>Nilai Kontrak akan otomatis ditampilkan sesuai dengan estimasi Nilai Kontrak pada Master Data Jenis Proyek, anda dapat mengubah jika ingin mengubah.</li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of main content -->
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
