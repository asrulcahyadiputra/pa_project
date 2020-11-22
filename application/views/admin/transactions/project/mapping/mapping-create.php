<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<div class="row layout-top-spacing">
			<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
				<div class="widget-content widget-content-area br-6">
					<h3>Form Buat Pemetaan Baru</h3>
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
					<form action="<?=site_url('transaksi/pemetaan/simpan')?>" method="POST" class="needs-validation" novalidate>
						<div class="row mt-4">
							<div class="col-xl-4 col-lg-4 col-sm-4">
								<div class="form-group">
									<label for="">Kode Pemetaan</label>
									<input type="text" name="mapping_id" class="form-control" value="AUTO" disabled >
								</div>
								<div class="form-group">
									<label for="">Pilih Jenis Proyek</label>
									<select name="t_project_id" id="t_project_id" class="form-control" required>
										<option value="">-pilih jenis proyek-</option>
										<?php foreach ($project_type as $p) : ?>
										<option value="<?= $p['t_project_id'] ?>">
											<?= $p['t_project_id'] . ' - ' . $p['t_project_name']?>
										</option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<label for="">Catatan</label>
									<textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
								</div>

							</div>
							<div class="col-xl-12 col-lg-12 col-sm-12">
								<div class="table-responsive mb-4 mt-4">
									<table class="table table-hover" id="tbl_posts">
										<thead>
											<tr>
												<th>#</th>
												<th>Pekerjaan</th>
												<th class="no-content"></th>
											</tr>
										</thead>
										<tbody id="tbl_posts_body" class="contents">
											
										</tbody>
									</table>
									<div class="text-right  mt-2">
										<a href="#" class="add-record" data-added="0"><u>+Tambah Baris</u></a>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-sm-12">
								<div class="text-right">
									<a href="" class="btn btn-outline-danger">Batalkan</a>
									<button type="submit" class="btn btn-outline-success">Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end of main content -->
 <!-- invisible tag -->
    <div class="invisible">
        <table id="sample_table">
            <tr>
                <td class="text-center">
                    <span class="sn"></span>
                </td>
               
                <td>
                    <select name="work_id[]" class="form-control" required>
                        <option value="">-pilih pekerjaan-</option>
                        <?php foreach ($work_type as $w) : ?>
                        <option value="<?= $w['work_id'] ?>">
                            <?= $w['work_id'] . ' - ' . $w['work_name']?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td class="text-center">
                    <a href="#" class="text-danger  btn-icon delete-record" data-id="0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
				</a>
                </td>
            </tr>
        </table>
    </div>
	
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
