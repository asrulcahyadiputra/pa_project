<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <!-- button add realization -->
                <a href="<?= site_url('transaksi/pembayaran/baru') ?>" class="btn btn-outline-primary mb-4 mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                    Pembayaran Baru</a>

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
                    <h5>Pembayaran Proyek</h5>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover table-realitation" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Bukti</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Kode Kontrak</th>
                                    <th>Keterangan</th>
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
                                        <td><?= shortdate_indo($row['payment_date']) ?></td>
                                        <td><?= $row['ref'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= nominal($row['total']) ?></td>

                                        <td>

                                            <a href="<?= site_url('transaksi/pembayaran/hapus/' . $row['trans_id']) ?>" class="text-warning" onclick="confirm('Data Akan dihapus secara permanen, apakah anda yakin ?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
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
    <?php $this->load->view('admin/transactions/accounting/payment/script') ?>