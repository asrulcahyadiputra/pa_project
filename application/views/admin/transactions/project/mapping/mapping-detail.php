<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<div class="widget-content widget-content-area br-6">
					<h3>Detail Pemetaan Proyek</h3>
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
						<!-- work mapping -->
						<div class="col-xl-8 col-lg-8 col-sm-8">
							<table class="table">
								<tr>
									<td>Kode Pemetaan</td>
									<td style="width: 1%;">:</td>
									<td><?= $mapping['trans_id'] ?></td>
								</tr>
								<tr>
									<td>Jenis Proyek</td>
									<td style="width: 1%;">:</td>
									<td><?= $mapping['t_project_name'] . ' ' . $mapping['type'] ?></td>
								</tr>
								<tr>
									<td>Catatan</td>
									<td style="width: 1%;">:</td>
									<td><?= $mapping['description'] ?></td>
								</tr>
							</table>
						</div>
						<div class="col-xl-6 col-lg-6 col-sm-6">
							<div class="table-responsive mb-4 mt-4">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Pekerjaan</th>
											<th class="no-content"></th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($work_group as $r1) : ?>
											<tr>
												<td><b><?= Romawi($no++) ?></b></td>
												<td><b><?= $r1['work_group_name'] ?></b></td>
												<td>
													<a href="#addWork<?= $r1['work_group_id'] ?>" data-toggle="modal" data-target="#addWork<?= $r1['work_group_id'] ?>">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
															<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
															<line x1="12" y1="8" x2="12" y2="16"></line>
															<line x1="8" y1="12" x2="16" y2="12"></line>
														</svg>
													</a>
												</td>
											</tr>
											<?php $no1 = 1;
											foreach ($details as $r2) : ?>
												<?php if ($r1['work_group_id'] == $r2['work_group_id']) : ?>
													<tr>
														<td><?= $no1++ ?></td>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $r2['work_name'] ?></td>
														<td>
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= site_url('transaksi/pemetaan/hapus/' . $r2['pm_id'] . '/' . $r2['trans_id']) ?>" class="text-danger" onclick="return confirm('Data akan dihapus, apakah anda yakin ?')">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square">
																	<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
																	<line x1="9" y1="9" x2="15" y2="15"></line>
																	<line x1="15" y1="9" x2="9" y2="15"></line>
																</svg>
															</a>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.work mapping -->

						<!-- material mapping -->
						<div class="col-xl-6 col-lg-6 col-sm-6">
							<div class="table-responsive mb-4 mt-4">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Material</th>
											<th class="no-content"></th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($work_group as $r1) : ?>
											<tr>
												<td><b><?= Romawi($no++) ?></b></td>
												<td><b><?= $r1['work_group_name'] ?></b></td>
												<td>
													<a href="#addMaterial<?= $r1['work_group_id'] ?>" data-toggle="modal" data-target="#addMaterial<?= $r1['work_group_id'] ?>">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
															<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
															<line x1="12" y1="8" x2="12" y2="16"></line>
															<line x1="8" y1="12" x2="16" y2="12"></line>
														</svg>
													</a>
												</td>
											</tr>
											<?php $no1 = 1;
											foreach ($materials as $r2) : ?>
												<?php if ($r1['work_group_id'] == $r2['work_group_id']) : ?>
													<tr>
														<td><?= $no1++ ?></td>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $r2['material_name'] ?></td>
														<td>
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= site_url('transaksi/material/hapus/' . $r2['pjm_id'] . '/' . $r2['trans_id']) ?>" class="text-danger" onclick="return confirm('Data akan dihapus, apakah anda yakin ?')">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square">
																	<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
																	<line x1="9" y1="9" x2="15" y2="15"></line>
																	<line x1="15" y1="9" x2="9" y2="15"></line>
																</svg>
															</a>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.material mapping -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of main content -->

	<!-- Modal work mapping-->
	<?php foreach ($work_type as $w) : ?>
		<div class="modal fade" id="addWork<?= $w['work_group_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?= $w['work_group_name'] ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= site_url('transaksi/pemetaan/manual_entry') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label for="">Kode Pemetaan</label>
								<input type="text" name="trans_id" value="<?= $trans_id ?>" class="form-control" readonly>
							</div>
							<?php foreach ($work_type as $jw) : ?>
								<?php if ($w['work_group_id'] == $jw['work_group_id']) : ?>
									<div class="form-group form-check">
										<input type="checkbox" class="form-check-input" value="<?= $jw['work_id'] ?>" name="work_id[]">
										<label class="form-check-label"><?= $jw['work_name'] ?></label>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Tambahkan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	<!-- /.work mapping -->

	<!-- Modal material mapping -->
	<?php foreach ($work_type as $w) : ?>
		<div class="modal fade" id="addMaterial<?= $w['work_group_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Material Untuk <?= $w['work_group_name'] ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= site_url('transaksi/material/manual_entry') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label for="">Kode Pemetaan</label>
								<input type="text" name="trans_id" value="<?= $trans_id ?>" class="form-control" readonly>
							</div>
							<input type="hidden" name="work_group_id" value="<?= $w['work_group_id'] ?>">
							<?php foreach ($raw_materials as $mt) : ?>
								<div class="form-group form-check form-check-inline">
									<input type="checkbox" class="form-check-input" value="<?= $mt['material_id'] ?>" name="material_id[]" id="<?= 'mt' . $mt['material_id'] . '' . $w['work_group_id'] ?>">
									<label class="form-check-label" for="<?= 'mt' . $mt['material_id'] . '' . $w['work_group_id'] ?>"><?= $mt['material_name'] ?></label>
								</div>
							<?php endforeach ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Tambahkan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	<!-- /.material mapping -->
	<?php $this->load->view('_partials/footer') ?>
