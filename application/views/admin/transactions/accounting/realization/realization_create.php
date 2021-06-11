<?php $this->load->view('_partials/header') ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <h4>Daftar Anggaran Proyek</h4>
                        <div class="row mt-4">
                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                <form>
                                    <select name="proyek" id="proyek" class="form-control">
                                        <option value=""></option>
                                        <?php foreach ($anggaran as $rowData) : ?>
                                            <option value="<?= $rowData['trans_id'] ?>"><?= $rowData['trans_id'] . ' - ' . $rowData['project_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <h4>Realisasi Anggaran Proyek</h4>
                        <div class="row mt-4">

                            <div class="col-xl-6 col-lg-6 col-sm-6" id="data-header">

                            </div>

                            <div class="col-xl-12 col-lg-12 col-sm-12">
                                <div class="table-responsive mb-4 mt-4" id="data-content">
                                    <table id='mangkubumiTable' class='table table-sm'>
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Anggaran</th>
                                                <th>Realisasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of main content -->

    <script>
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
    <?php $this->load->view('admin/transactions/accounting/realization/script') ?>