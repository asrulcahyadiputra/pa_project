<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-spacing">

                    <!-- Content -->
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                             
                                <div class="text-center user-info">
                                    <p class=""><?=$project['project_name']?></p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
								<table class="table">
									<tr>
										<td>Pelanggan</td>
										<td style="width: 1%;">:</td>
										<td><?=$project['client_name']?></td>
									</tr>
									<tr>
										<td>No Hp</td>
										<td style="width: 1%;">:</td>
										<td><?=$project['client_phone']?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td style="width: 1%;">:</td>
										<td><?=$project['client_address']?></td>
									</tr>
									<tr>
										<td>Jenis Proyek</td>
										<td style="width: 1%;">:</td>
										<td><?=$project['t_project_name']?></td>
									</tr>
									<tr>
										<td>Nilai Kontrak</td>
										<td style="width: 1%;">:</td>
										<td><?=nominal($project['total'])?></td>
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
										<?php $prog = ($py['payment_progress']/$project['p_method_step']) * 100?>
										<?=$prog.'%'?>
									</span> 
								</div>
							</div>
                                </div>
                            </div>
                        </div>
				    <div class="education layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Timeline</h3>
                                <div class="timeline-alter">
							<?php foreach($tm as $t): ?>
								<div class="item-timeline">
									<div class="t-meta-date">
										<p class=""><?=date('d-m-Y',strtotime($t['due']))?></p>
									</div>
									<div class="t-dot">
									</div>
									<div class="t-text">
										<p><?=$t['pt_name']?></p>
									</div>
								</div>
							 <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>
	<?php $this->load->view('_partials/footer') ?>
