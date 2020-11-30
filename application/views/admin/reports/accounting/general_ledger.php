<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
					<form method="POST" action="<?=site_url('laporan/jurnal')?>" class="form-inline">
						<label class="sr-only" for="inlineFormInputName2">Name</label>
						<input type="month" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="periode">

						<button type="submit" class="btn btn-primary mb-2">Tampilkan</button>
					</form>
				<div class="widget-content widget-content-area br-6">
					<h3>Jurnal Umum</h3>
					<p>Periode : <?=bulan($month).' '.$year?></p>
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
								<tr>
									<th>Tanggal</th>
									<th>Akun</th>
									<th>Ref</th>
									<th>Debit</th>
									<th>Kredit</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($row_ledger as $r1): ?>
								<tr>
									<td rowspan="<?=$r1['row']+1?>"><?=$r1['gl_date']?></td>
								</tr>
									<?php foreach($ledger as $r2): ?>
										<?php if($r1['gl_ref'] == $r2['gl_ref']): ?>
											<tr>
												<?php if($r2['gl_balance'] == 'd'): ?>
													<td><?=$r2['account_no'].' '.$r2['account_name']?></td>
												<?php endif ?>
												<?php if($r2['gl_balance'] == 'k'): ?>
														<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$r2['account_no'].' '.$r2['account_name']?></td>
												<?php endif ?>
														<td><?=$r2['gl_ref']?></td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?php 
																if($r2['gl_balance'] == 'd')
																{
																	echo nominal1($r2['gl_nominal']);
																}
																else
																{
																	echo "-";
																} 
																?>
															</span>
														</td>
														<td>
															<span class="text-left">Rp</span>
															<span style="float:right;">
																<?php 
																if($r2['gl_balance'] == 'k')
																{
																	echo nominal1($r2['gl_nominal']);
																}
																else
																{
																	echo "-";
																} ?>
															</span>
														</td>
											</tr>
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
	<?php $this->load->view('_partials/footer') ?>
