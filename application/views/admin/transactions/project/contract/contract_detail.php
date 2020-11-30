<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">

		<div class="row layout-spacing">

			<!-- Content -->
			<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

				<div class="user-profile layout-spacing">
					<div class="widget-content widget-content-area">

						<div class="text-center user-info">
							<p class=""><?= $project['project_name'] ?></p>
						</div>
						<div class="user-info-list">

							<div class="">
								<table class="table">
									<tr>
										<td>Pelanggan</td>
										<td style="width: 1%;">:</td>
										<td><?= $project['client_name'] ?></td>
									</tr>
									<tr>
										<td>No Hp</td>
										<td style="width: 1%;">:</td>
										<td><?= $project['client_phone'] ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td style="width: 1%;">:</td>
										<td><?= $project['client_address'] ?></td>
									</tr>
									<tr>
										<td>Jenis Proyek</td>
										<td style="width: 1%;">:</td>
										<td><?= $project['t_project_name'] ?></td>
									</tr>
									<tr>
										<td>Nilai Kontrak</td>
										<td style="width: 1%;">:</td>
										<td><?= nominal($project['total']) ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

				<div class="skills layout-spacing ">
					<div class="widget-content widget-content-area">
						<h3 class="">Progres Pembayaran</h3>
						<div class="progress br-30">
							<div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
								<div class="progress-title">
									<span>Pembayaran</span>
									<span>
										<?php $prog = ($py['payment_progress'] / $project['p_method_step']) * 100 ?>
										<?= $prog . '%' ?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="education layout-spacing ">
					<div class="widget-content widget-content-area">
						<h3 class="">Timeline</h3>
						<div class="text-right">
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addTimeline">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<line x1="5" y1="12" x2="19" y2="12"></line>
								</svg>
								Tambah
							</a>
						</div>
						<div class="timeline-alter">
							<?php foreach ($tm as $t) : ?>
								<div class="item-timeline">
									<div class="t-meta-date">
										<p class=""><?= date('d-m-Y', strtotime($t['due'])) ?></p>
									</div>
									<div class="t-dot">
									</div>
									<div class="t-text">
										<p><?= $t['pt_name'] ?></p>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="addTimeline" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Tambah Timeline</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
							<line x1="18" y1="6" x2="6" y2="18"></line>
							<line x1="6" y1="6" x2="18" y2="18"></line>
						</svg>
					</button>
				</div>
				<form action="<?= site_url('transaksi/kontrak/add_timeline/' . $project['trans_id']) ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="pt_name">Timeline</label>
							<textarea name="pt_name" id="pt_name" cols="30" rows="3" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<label for="tanggal">Tanggal Pelaksanaan</label>
							<input type="date" name="due" id="due" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php $this->load->view('_partials/footer') ?>
