<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var reportContent = $('#content-report')
    var filterContent = $('#filter-form')
    var closeFilter = $('#btn-closeFilter')
    var openFilter = $('#btn-openFilter')
    var filter = $('#btn-filter')

    reportContent.hide()
    openFilter.hide()
    filterContent.show()

    filter.on('click', function() {
        var no_bukti = $('#no_bukti').val()
        var periode = $('#periode').val()
        console.log(no_bukti)
        $.ajax({
            type: 'POST',
            url: '<?= site_url('laporan/laporan_realisasi/load') ?>',
            data: {
                no_bukti: no_bukti,
                periode: periode
            },
            dataType: 'JSON',
            success: function(data) {
                var rowData = data.values
                var html = ''
                console.log(data)
                if (rowData.length > 0) {

                    for (let i = 0; i < rowData.length; i++) {
                        html += `
                            <table>
                                <tr>
                                    <td style='width:30%'>No Bukti</td>
                                    <td style='width:1%'>:</td>
                                    <td >` + rowData[i].trans_id + `</td>
                                </tr>
                                <tr>
                                    <td style='width:30%'>Kode Kontrak</td>
                                    <td style='width:1%'>:</td>
                                    <td >` + rowData[i].ref + `</td>
                                </tr>
                                <tr>
                                    <td style='width:30%'>Periode</td>
                                    <td style='width:1%'>:</td>
                                    <td >` + rowData[i].periode + `</td>
                                </tr>
                                <tr>
                                    <td style='width:30%'>Tanggal Bayar</td>
                                    <td style='width:1%'>:</td>
                                    <td >` + rowData[i].tanggal + `</td>
                                </tr>
                                <tr>
                                    <td style='width:30%'>Keterangan</td>
                                    <td style='width:1%'>:</td>
                                    <td >` + rowData[i].desc + `</td>
                                </tr>
                            </table>
                        `
                        html += `<table class='table table-sm table-bordered'>
                            <head>
                                <tr class='bg-primary'>
                                    <th style='width:1%' class='text-center'>No</th>
                                    <th style='width: 20%'>Kode</th>
                                    <th style='width: 40%'>Pekerjaan</th>
                                    <th>Anggaran</th>
                                    <th>Realisasi</th>
                                    <th>Perbedaan</th>
                                </tr>
                            </head>
                            <tbody>`
                        var no2 = 1
                        var totBudget = 0
                        var totRealitation = 0
                        var rowDetail = rowData[i].detail
                        for (let y = 0; y < rowData[i].detail.length; y++) {
                            var selisih = parseInt(rowDetail[y].budget - rowDetail[y].realitation)
                            html += `<tr>
                                <td>` + no2++ + `</td>
                                <td>` + rowDetail[y].work_id + `</td>
                                <td>` + rowDetail[y].work_name + `</td>
                                <td class='text-right'>` + new Intl.NumberFormat('de-DE').format(rowDetail[y].budget) + `</td>
                                <td class='text-right'>` + new Intl.NumberFormat('de-DE').format(rowDetail[y].realitation) + `</td>
                                <td class='text-right'>` + new Intl.NumberFormat('de-DE').format(selisih) + `</td>
                           </tr>`
                            totBudget += parseInt(rowDetail[y].budget)
                            totRealitation += parseInt(rowDetail[y].realitation)
                        }
                        html += `</tbody>`
                        html += `<tfoot>
                            <tr style='background-color:#dee2e6'>
                                <th colspan='3'>Total</th>
                                <th class='text-right'>` + new Intl.NumberFormat('de-DE').format(totBudget) + `</th>
                                <th class='text-right'>` + new Intl.NumberFormat('de-DE').format(totRealitation) + `</th>
                                <th class='text-right'>` + new Intl.NumberFormat('de-DE').format(totBudget - totRealitation) + `</th>
                            </tr>
                        </tfoot></table>`

                        html += `<div style='background-color:#f8f9fa' class='col-12 mt-4'>
                            <span>&nbsp;</span>
                        </div>`
                    }

                    $('#load-here').html(html)
                } else {
                    Swal.fire(
                        '204',
                        'Data Laporan Tidak Ditemukan!',
                        'error'
                    )
                    html += `<div class='col-12 text-center'>
                        <img src='<?= base_url('assets/img/myimage/data-kosong.png') ?>' style='width:20%'>
                        <br>
                        <span>Data Kosong !</span>
                    </div>`
                    $('#load-here').html(html)
                }
            }
        })
        openFilter.show()
        closeFilter.hide()
        filter.hide()
        reportContent.show()
        filterContent.hide()
    })

    openFilter.on('click', function() {
        openFilter.hide()
        closeFilter.show()
        filter.show()
        reportContent.show()
        filterContent.show()
    })

    closeFilter.on('click', function() {
        openFilter.show()
        closeFilter.hide()
        filter.hide()
        reportContent.show()
        filterContent.hide()
    })
</script>