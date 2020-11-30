<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<div class="widget-content widget-content-area br-6">
					<h3>Edit Rencana Anggaran Biaya</h3>
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
					<div class="row mt-4">
						<div class="col-xl-6 col-lg-6 col-sm-6">
							<table class="table">
								<tr>
									<td>Kode Proyek</td>
									<td style="width: 1%;">:</td>
									<td><?= $project['trans_id'] ?></td>
								</tr>
								<tr>
									<td>Nama Proyek</td>
									<td style="width: 1%;">:</td>
									<td><?= $project['project_name'] ?></td>
								</tr>
								<tr>
									<td>Nilai Kontrak</td>
									<td style="width: 1%;">:</td>
									<td><?= nominal($project['total']) ?></td>
								</tr>
							</table>
						</div>
						<div class="col-xl-12 col-lg-12 col-sm-12">
							<div class="table-responsive mb-4 mt-4">
								<form method="POST" action="<?= site_url('transaksi/anggaran/update') ?>" class="needs-validation" novalidate>
									<input type="hidden" name="trans_id" value="<?= $trans_id ?>">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Pekerjaan</th>
												<th>Satuan</th>
												<th>Vol</th>
												<th>Harga Satuan</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($work_group as $r1) : ?>
												<tr>
													<td><b><?= Romawi($no++) ?></b></td>
													<td><b><?= $r1['work_group_name'] ?></b></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php $no1 = 1;
												foreach ($details as $r2) : ?>
													<?php if ($r1['work_group_id'] == $r2['work_group_id']) : ?>
														<tr>
															<td><?= $no1++ ?></td>
															<td>
																&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $r2['work_name'] ?>
																<input type="hidden" name="pb_id[]" class="form-control" value="<?= $r2['pb_id'] ?>" required>
															</td>
															<td>
																<input type="text" name="pb_unit[]" class="form-control" value="<?= $r2['pb_unit'] ?>" required>
															</td>
															<td>
																<input type="number" name="pb_qty_budget[]" class="form-control" min="1" value="<?= $r2['pb_qty_budget'] ?>" required>
															</td>
															<td>
																<input type="text" name="pb_unit_price_budget[]" class="form-control" data-type="currency" value="<?= nominal($r2['pb_unit_price_budget']) ?>" required>
															</td>
														</tr>
													<?php endif ?>
												<?php endforeach ?>
											<?php endforeach ?>
										</tbody>
									</table>
									<div class="form-group text-right">
										<a href="<?= site_url('transaksi/anggaran') ?>" class="btn btn-danger">Batal</a>
										<button type="submit" class="btn btn-success" onclick="return confirm('Data tidak dapat dikemnalikan, Apakah anda yakin ?')">Simpan Perubahan</button>
									</div>
								</form>
							</div>
						</div>
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
