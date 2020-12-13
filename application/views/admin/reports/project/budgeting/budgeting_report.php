<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<form method="GET" action="<?= site_url('laporan/anggaran') ?>" class="form-inline">
					<label class="sr-only" for="inlineFormInputName2">Name</label>
					<input type="month" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="periode">

					<button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
				</form>
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
					<p>Periode <?= bulan($month) . ' ' . $year ?></p>
					<div class="table-responsive mb-4 mt-4">
						<table id="zero-config" class="table table-hover" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Kontrak</th>
									<th>Nama Proyek</th>
									<th>Luas Bangunan</th>
									<th>Nilai Kontrak</th>
									<th>Anggaran Biaya</th>
									<th>Anggaran Material</th>
									<th class="no-content"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($all as $row) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $row['trans_id'] ?></td>
										<td><?= $row['project_name'] ?></td>
										<td><?= nominal1($row['surface_area']) ?> M<sup>2</sup> </td>
										<td><?= nominal($row['total']) ?></td>
										<td><?= nominal($row['rab']) ?></td>
										<td><?= nominal($row['material']) ?></td>
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
