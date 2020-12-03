<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<a href="#addCoa" class="btn btn-outline-primary mb-4 mt-4" data-toggle="modal" data-target="#addCoa">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
						<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
						<line x1="12" y1="8" x2="12" y2="16"></line>
						<line x1="8" y1="12" x2="16" y2="12"></line>
					</svg>
					Tambah CoA</a>
				<div class="widget-content widget-content-area br-6">
					<h3>Daftar Chart of Account</h3>
					<?php if ($this->session->flashdata()) : ?>
						<?php if ($this->session->flashdata('success')) : ?>
							<div class="alert alert-success" role="alert">
								<?= $this->session->flashdata('success');
								?>
							</div>
						<?php endif ?>
						<?php if ($this->session->flashdata('error')) : ?>
							<div class="alert alert-danger" role="alert">
								<?= $this->session->flashdata('success');
								?>
							</div>
						<?php endif ?>
					<?php endif ?>
					<div class="table-responsive mb-4 mt-4">
						<table id="zero-config" class="table table-hover" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Chart of Account</th>
									<th>Saldo Normal</th>
									<th class="no-content"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($head as $h) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><b><?= $h['head_code'] . ' ' . $h['head_name'] ?></b></td>
										<td></td>
										<td></td>
									</tr>
									<?php foreach ($sub as $s) : ?>
										<?php if ($s['head_code'] == $h['head_code']) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><b>&nbsp;&nbsp;&nbsp;<?= $s['sub_code'] . ' ' . $s['sub_name'] ?></b></td>
												<td></td>
												<td></td>
											</tr>

											<?php foreach ($all as $row) : ?>
												<?php if ($s['sub_code'] == $row['sub_code']) : ?>
													<tr>
														<td><?= $no++ ?></td>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $row['account_no'] . ' ' . $row['account_name'] ?></td>
														<td><?php
															if ($row['normal_balance'] == 'd') {
																echo "Debet";
															} else {
																echo "Kredit";
															}
															?></td>
														<td>
															<a href="#editCoa<?= $row['account_no'] ?>" data-toggle="modal" data-target="#editCoa<?= $row['account_no'] ?>">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
																	<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
																	<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
																</svg>
															</a>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										<?php endif ?>
									<?php endforeach ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of main content -->

	<!-- Modal add CoA -->
	<div class="modal fade" id="addCoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Chart of Account</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= site_url('Master/coa/store') ?>" method="POST" class="needs-validation" novalidate>
					<div class="modal-body">
						<div class="form-group">
							<label>Kode CoA</label>
							<input type="text" value="AUTO" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label>Header CoA</label>
							<select name="sub_code" class="form-control">
								<option value="">-pilih header-</option>
								<?php foreach ($sub as $h) : ?>
									<option value="<?= $h['sub_code'] ?>"><?= $h['sub_code'] . ' ' . $h['sub_name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Nama CoA</label>
							<input type="text" class="form-control" name="account_name" required>
						</div>
						<div class="form-group">
							<label>Normal Balance</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="normal_balance" id="inlineRadio1" value="d" checked>
								<label class="form-check-label" for="inlineRadio1">Debet</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="normal_balance" id="inlineRadio2" value="k">
								<label class="form-check-label" for="inlineRadio2">Kredit</label>
							</div>
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
	<!-- Modal edit CoA -->
	<?php foreach ($all as $row) : ?>
		<div class="modal fade" id="editCoa<?= $row['account_no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit CoA</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= site_url('Master/coa/update') ?>" method="POST" class="needs-validation" novalidate>
						<div class="modal-body">
							<div class="form-group">
								<label>Kode CoA</label>
								<input type="text" value="<?= $row['account_no'] ?>" class="form-control" name="account_no" readonly>
							</div>
							<div class="form-group">
								<label>Nama CoA</label>
								<input type="text" class="form-control" value="<?= $row['account_name'] ?>" name="account_name" required>
							</div>
							<div class="form-group">
								<label>Normal Balance</label><br>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="normal_balance" id="inlineRadio1" value="d" <?= $row['normal_balance'] == 'd' ? 'checked' : '' ?>>
									<label class="form-check-label" for="inlineRadio1">Debet</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="normal_balance" id="inlineRadio2" value="k" <?= $row['normal_balance'] == 'k' ? 'checked' : '' ?>>
									<label class="form-check-label" for="inlineRadio2">Kredit</label>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
							<button type="sumbit" class="btn btn-primary">Simpan Perubahan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach ?>
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
