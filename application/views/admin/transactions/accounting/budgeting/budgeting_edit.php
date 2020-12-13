<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="container">
				<div id="tabsIcons" class="col-lg-12 col-12 layout-spacing">

					<div class="widget-header">
						<div class="row">
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">

							</div>
						</div>
					</div>
					<div class="widget-content widget-content-area icon-tab">
						<h3>Edit Rencana Anggaran Biaya Proyek</h3>
						<ul class="nav nav-tabs  mb-3 mt-3" id="iconTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="dataProyek" data-toggle="tab" href="#Proyek" role="tab" aria-controls="Proyek" aria-selected="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
										<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
										<polyline points="9 22 9 12 15 12 15 22"></polyline>
									</svg> Proyek
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="icon-aggaran-tab" data-toggle="tab" href="#icon-anggaran" role="tab" aria-controls="icon-anggaran" aria-selected="false">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
										<line x1="12" y1="1" x2="12" y2="23"></line>
										<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
									</svg> Anggaran Proyek
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="icon-contact-tab" data-toggle="tab" href="#icon-contact" role="tab" aria-controls="icon-contact" aria-selected="false">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
										<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
										<polyline points="2 17 12 22 22 17"></polyline>
										<polyline points="2 12 12 17 22 12"></polyline>
									</svg> Anggaran Material
								</a>
							</li>
						</ul>
						<form method="POST" action="<?= site_url('transaksi/anggaran/update') ?>" class="needs-validation" novalidate>
							<!-- tab-content -->
							<div class="tab-content" id="iconTabContent-1">
								<div class="tab-pane fade show active" id="Proyek" role="tabpanel" aria-labelledby="Proyek-tab">
									<div class="col-xl-12 col-lg-12 col-sm-12">
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
								</div>
								<!-- /.data-proyek -->

								<div class="tab-pane fade" id="icon-anggaran" role="tabpanel" aria-labelledby="icon-anggaran-tab">
									<p class="dropcap  dc-outline-primary">
										<div class="col-xl-12 col-lg-12 col-sm-12">
											<div class="table-responsive mb-4 mt-4">
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
																			<input type="hidden" name="work_id[]" class="form-control" value="<?= $r2['work_id'] ?>" required>

																			<input type="hidden" name="pb_id[]" class="form-control" value="<?= $r2['pb_id'] ?>" required>
																		</td>
																		<td>
																			<input type="text" name="pb_unit[]" class="form-control" value="<?= $r2['pb_unit'] ?>" required>
																		</td>
																		<td>
																			<input type="number" name="pb_qty_budget[]" class="form-control" min="1" value="<?= $r2['pb_qty_budget'] ?>" required>
																		</td>
																		<td>
																			<input type="text" name="pb_unit_price_budget[]" class="form-control" value="<?= nominal($r2['pb_unit_price_budget']) ?>" data-type="currency" required>
																		</td>
																	</tr>
																<?php endif ?>
															<?php endforeach ?>
														<?php endforeach ?>
													</tbody>
												</table>

											</div>
										</div>
									</p>
								</div>
								<!-- /.data-rab -->

								<div class="tab-pane fade" id="icon-contact" role="tabpanel" aria-labelledby="icon-contact-tab">
									<p class="dropcap  dc-outline-primary">
										<div class="col-xl-12 col-lg-12 col-sm-12">
											<div class="table-responsive mb-4 mt-4">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>#</th>
															<th>Material</th>
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
															foreach ($materials as $r2) : ?>
																<?php if ($r1['work_group_id'] == $r2['work_group_id']) : ?>
																	<tr>
																		<td><?= $no1++ ?></td>
																		<td>
																			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $r2['material_name'] ?>
																			<input type="hidden" name="material_id[]" class="form-control" value="<?= $r2['material_id'] ?>" required>

																			<input type="hidden" name="work_group_id[]" class="form-control" value="<?= $r2['work_group_id'] ?>" required>

																			<input type="hidden" name="mb_id[]" class="form-control" value="<?= $r2['mb_id'] ?>" required>
																		</td>
																		<td>
																			<input type="text" name="mb_unit[]" class="form-control" value="<?= $r2['mb_unit'] ?>" required>
																		</td>
																		<td>
																			<input type="number" name="mb_qty_budget[]" value="<?= $r2['mb_qty_budget'] ?>" class="form-control" min="1" required>
																		</td>
																		<td>
																			<input type="text" name="mb_unit_price_budget[]" class="form-control" data-type="currency" value="<?= nominal($r2['mb_unit_price_budget']) ?>" required>
																		</td>
																	</tr>
																<?php endif ?>
															<?php endforeach ?>
														<?php endforeach ?>
													</tbody>
												</table>
												<div class="form-group text-right">
													<a href="<?= site_url('transaksi/anggaran') ?>" class="btn btn-danger">Batal</a>
													<button type="submit" class="btn btn-success">Simpan Perubahan</button>
												</div>

											</div>
										</div>
									</p>
								</div>
								<!-- /.data-material -->
							</div>
							<!-- /.tab-content -->
						</form>
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
