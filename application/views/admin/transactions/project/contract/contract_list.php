<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<a href="<?= site_url('transaksi/kontrak/baru') ?>" class="btn btn-outline-primary mb-4 mt-4">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
						<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
						<line x1="12" y1="8" x2="12" y2="16"></line>
						<line x1="8" y1="12" x2="16" y2="12"></line>
					</svg>
					Buat Kontrak Baru</a>
				<div class="widget-content widget-content-area br-6">
					<h3>Daftar Kontrak Proyek</h3>
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
									<th>Kode Kontrak</th>
									<th>Pelanggan</th>
									<th>Nama Proyek</th>
									<th>Estimasi Selesai</th>
									<th>Nilai</th>
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
										<td><?= date('d-m-Y', strtotime($row['project_due_date'])) ?></td>
										<td><?= nominal($row['total']) ?></td>
										<td>
											<a href="<?= site_url('transaksi/kontrak/detail/' . $row['trans_id']) ?>" class="text-info mr-2">
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
	<?php $this->load->view('_partials/footer') ?>