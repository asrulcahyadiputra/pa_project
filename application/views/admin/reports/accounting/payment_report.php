<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing" id="filter">
                <div class="widget-content widget-content-area br-6">
                    <form class="mt-3">
                        <div id="filter-form">
                            <div class="form-group row">
                                <label for="no_bukti" class="col-sm-4 col-form-label">No Bukti</label>
                                <div class="col-sm-8">
                                    <select name="no_bukti" id="no_bukti" class="form-control form-control-sm">
                                        <option value="all">Menampilkan Semua No Bukti</option>
                                        <?php foreach ($filter1 as $rowData) : ?>
                                            <option value="<?= $rowData['trans_id'] ?>"><?= $rowData['trans_id'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_kontrak" class="col-sm-4 col-form-label">Kode Kontrak</label>
                                <div class="col-sm-8">
                                    <select name="kode_kontrak" id="kode_kontrak" class="form-control form-control-sm">
                                        <option value="all">Menampilkan Semua Kode Kontrak</option>
                                        <?php foreach ($filter2 as $rowData) : ?>
                                            <option value="<?= $rowData['trans_id'] ?>"><?= $rowData['trans_id'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="periode" class="col-sm-4 col-form-label">Periode</label>
                                <div class="col-sm-8">
                                    <input type="text" name="periode" id="periode" class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-light col-sm-2" id="btn-closeFilter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                    Tutup</button>
                                <button type="button" class="btn btn-primary col-sm-2" id="btn-filter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    Tampilkan</button>
                                <button type="button" class="btn btn-primary col-sm-2" id="btn-openFilter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                    Filter</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing" id="content-report">
                <div class="widget-content widget-content-area br-6">
                    <div style="border-bottom: double; ">
                        <h5>Laporan Pembayaran</h5>
                        <small><i>*Disajikan Dalam Rupiah</i></small>
                    </div>

                    <div class="table-responsive mb-4 mt-4" id='load-here'>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of main content -->
    <!-- Modal add CoA -->
    <div class="modal fade" id="previewData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div id="modal-body" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preview Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="content-preview">
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('_partials/footer') ?>
    <?php $this->load->view('admin/reports/accounting/payment_script') ?>