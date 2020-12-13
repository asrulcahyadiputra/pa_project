<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<form method="GET" action="<?= site_url('laporan/buku_besar') ?>" class="form-inline">
					<div class="input-group mb-2 mr-sm-2">

						<select name="account_name" id="account_name" class="form-control" required>
							<option value="">--pilih--</option>
							<?php foreach ($list_akun as $ls) : ?>
								<option value="<?= $ls['account_name'] ?>"><?= $ls['account_name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<label class="sr-only" for="inlineFormInputName2">Name</label>
					<input type="month" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="periode" required>
					<button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
				</form>
				<div class="widget-content widget-content-area br-6">
					<h3>Buku Besar <?= $akun ?></h3>
					<p>Periode : <?= bulan($month) . ' ' . $year ?></p>
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
						<table class="table table-sm table-bordered">
							<thead>
								<tr class="text-center">
									<th rowspan="2">Tanggal</th>
									<th rowspan="2">Keterangan</th>
									<th rowspan="2">Ref</th>
									<th rowspan="2">Debet</th>
									<th rowspan="2">Kredit</th>
									<th colspan="2">Saldo</th>
								</tr>
								<tr class="text-center">
									<th>Debet</th>
									<th>Kredit</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= '01-' . $month . '-' . $year . ' 00:00:00' ?></td>
									<td><?= 'Saldo Awal ' . $akun ?></td>
									<td colspan="3" class=" table-active "></td>
									<td>
										<span class="text-left">Rp</span>
										<span style="float:right;">
											<?php if ($first['normal_balance'] == 'd') {
												$saldo_awal = $first['debet'] - $first['kredit'];
											} else {
												$saldo_awal = 0;
											} ?>

											<?= nominal1($saldo_awal) ?>
										</span>
									</td>
									<td>
										<span class="text-left">Rp</span>
										<span style="float:right;">
											<?php if ($first['normal_balance'] == 'k') {
												$saldo_awal = $first['kredit'] - $first['debet'];
											} else {
												$saldo_awal = 0;
											} ?>
											<?= nominal1($saldo_awal) ?>

										</span>
									</td>
								</tr>
								<?php
								$debet = 0;
								$kredit = 0;
								foreach ($all as $b) : ?>
									<tr>
										<td><?= date('d-m-Y H:i:s', strtotime($b['gl_date'])) ?></td>
										<td><?= $b['account_name'] ?></td>
										<td><?= $b['gl_ref'] ?></td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?= nominal1($b['debet']) ?>
											</span>
										</td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?= nominal1($b['kredit']) ?>
											</span>
										</td>

										<!-- begin saldo -->
										<?php
										if ($b['normal_balance'] == 'd') {
											$debet = $debet + ($b['debet'] - $b['kredit']);
										} else {
											$kredit = $kredit + ($b['kredit'] - $b['debet']);
										}
										?>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?php if ($b['normal_balance'] == 'd') {
													$saldo_awal = $first['debet'] - $first['kredit'];
													echo nominal1($saldo_awal + $debet);
												} else {
													echo nominal1(0);
												} ?>
											</span>
										</td>
										<td>
											<span class="text-left">Rp</span>
											<span style="float:right;">
												<?php if ($b['normal_balance'] == 'k') {
													$saldo_awal = $first['kredit'] - $first['debet'];
													echo nominal1($saldo_awal + $kredit);
												} else {
													echo nominal1(0);
												} ?>
											</span>
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
