<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<div class="widget-content widget-content-area br-6">
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
						<?php if ($this->session->flashdata('warning')) : ?>
							<div class="alert alert-warning" role="alert">
								<?= $this->session->flashdata('warning');
								?>
							</div>
						<?php endif ?>
					<?php endif ?>
					<h5>Rencana Anggaran Biaya Proyek</h5>
					<div class="table-responsive mb-4 mt-4">
						<table id="zero-config" class="table table-hover" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Kontrak</th>
									<th>Pelanggan</th>
									<th>Nama Proyek</th>
									<th>Nilai Kontrak</th>
									<th>Status</th>
									<th class="no-content"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($all as $row) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $row['trans_id'] ?></td>
										<td><?= $row['client_name'] ?></td>
										<td><?= $row['project_name'] ?></td>
										<td><?= nominal($row['total']) ?></td>
										<td>
											<?php if ($row['status'] == 0) : ?>
												<span class="text-warning bs-tooltip" title="Menunggu untuk dianggarkan">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
														<circle cx="12" cy="12" r="10"></circle>
														<polyline points="12 6 12 12 16 14"></polyline>
													</svg>
												</span>
											<?php endif ?>
											<?php if ($row['status'] == 1) : ?>
												<span class="text-primary bs-tooltip" title="Sudah dianggarkan">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-unlock">
														<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
														<path d="M7 11V7a5 5 0 0 1 9.9-1"></path>
													</svg>
												</span>
											<?php endif ?>
											<?php if ($row['status'] == 2) : ?>
												<span class="text-warning bs-tooltip" title="Sudah Realisasi">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
														<rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
														<path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
													</svg>
												</span>
											<?php endif ?>
										</td>
										<td>
											<a href="<?= site_url('transaksi/anggaran/create/' . $row['trans_id']) ?>" class="text-info mr-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
													<line x1="8" y1="6" x2="21" y2="6"></line>
													<line x1="8" y1="12" x2="21" y2="12"></line>
													<line x1="8" y1="18" x2="21" y2="18"></line>
													<line x1="3" y1="6" x2="3.01" y2="6"></line>
													<line x1="3" y1="12" x2="3.01" y2="12"></line>
													<line x1="3" y1="18" x2="3.01" y2="18"></line>
												</svg>
											</a>
											<a href="<?= site_url('transaksi/anggaran/edit/' . $row['trans_id']) ?>" class="text-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
													<path d="M12 20h9"></path>
													<path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
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
	<?php $this->load->view('_partials/footer') ?>
