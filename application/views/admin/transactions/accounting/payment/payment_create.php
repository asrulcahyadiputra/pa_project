<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <form action="<?= site_url('transaksi/pembayaran/simpan') ?>" method="POST" class="needs-validation" novalidate>
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <h4>Pembayaran Proyek</h4>
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="kode_proyek">Kode Proyek</label>
                                    <select name="kode_kontrak" id="kode_proyek" class="form-control" required>
                                        <option value=""></option>
                                        <?php foreach ($project as $rowData) : ?>
                                            <option value="<?= $rowData['trans_id'] ?>"><?= $rowData['trans_id'] . '-' . $rowData['project_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="payment_date">Tanggal Bayar</label>
                                    <input type="date" name="payment_date" id="payment_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="desciption">Keterangan</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="table-responsive mb-4 mt-4" id="data-content">
                                    <table id='mangkubumiTable' class='table table-sm'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Keterangan</th>
                                                <th>Nominal Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <button type="submit" id="btn-save" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- end of main content -->

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
    <?php $this->load->view('admin/transactions/accounting/payment/script') ?>