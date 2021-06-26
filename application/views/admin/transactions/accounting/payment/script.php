<script>
    $(document).ready(function() {
        //table initialize
        var buttonSave = $('#btn-save')
        buttonSave.hide()
        var myTable = $('#mangkubumiTable').DataTable({
            "paging": false,
            "searching": false,
            "ordering": false,
            "info": false,
            columnDefs: [
                // {
                //     "targets": 0,
                //     "searchable": false,
                //     "orderable": false,
                //     "className": 'selectall-checkbox',
                //     'render': function(data, type, full, meta) {
                //         return '<input type="checkbox" name="checked[]">';
                //     }
                // },
                // {
                //     'targets': [1],
                //     data: null,
                //     'defaultContent': '<input class="form-control" name="realization[]" data-type="currency"/>'
                // }
                {
                    'targets': [2],
                    'className': 'text-right',
                    'render': $.fn.dataTable.render.number('.', ',', 0, '')
                },
            ],
            // select: {
            //     style: 'multi',
            //     selector: 'td:first-child'
            // },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'ket'
                },
                {
                    data: 'nominal'
                },
            ]
        });


        $('#kode_proyek').on('change', function() {
            var trans_id = $('#kode_proyek').val()
            var html = ''
            console.log(trans_id)
            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/pembayaran/find_angsuran') ?>',
                dataType: 'JSON',
                data: {
                    trans_id: trans_id
                },
                success: function(data) {
                    console.log(data)
                    myTable.clear().draw()
                    var res = data
                    console.log(res)
                    if (res.length > 0) {
                        myTable.rows.add(res).draw(false);
                        buttonSave.show()
                        console.log('data here')
                        $("input[data-type='currency']").on({
                            keyup: function() {
                                formatCurrency($(this));
                            },
                            blur: function() {
                                formatCurrency($(this), "blur");
                            }
                        });
                    } else {
                        myTable.clear().draw()
                        alert('Proyek Harus di pilih')
                        buttonSave.hide()
                    }

                }

            })
        })
        $('.table-realitation tbody').on('click', 'td', function(e) {
            console.log('im here')
            var index = $(this).index()
            var trans_id = $(this).closest('tr').find('td').eq(1).html();
            var ref_id = $(this).closest('tr').find('td').eq(2).html();
            console.log(trans_id)
            var html = ''
            if (index != 4) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('transaksi/realisasi/prev') ?>',
                    dataType: 'JSON',
                    data: {
                        trans_id: trans_id,
                        ref_realitation: ref_id
                    },
                    success: function(data) {
                        console.log(data)
                        var detail = data.detail
                        var desc = data.desc
                        html += `<div class='col-8'><table class='table'>
                            <tr>
                                <td>No Bukti</td>
                                <td style:'width:1%'>:</td>
                                <td>` + trans_id + `</td>
                            </tr>
                            <tr>
                                <td>No Kontrak</td>
                                <td style:'width:1%'>:</td>
                                <td>` + desc.trans_id + `</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td style:'width:1%'>:</td>
                                <td>` + desc.project_name + `</td>
                            </tr>
                        </table></div>`
                        html += `<table class='table table-bordered'>
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Pekerjaan</th>
                                <th>Anggaran</th>
                                <th>Realisasi</th>
                                <th>Perbedaan</th>
                            </thead>
                            <tbody>`
                        for (let index = 0; index < detail.length; index++) {
                            html += `<tr>
                                <td>` + detail[index].no + `</td>
                                <td>` + detail[index].work_id + `</td>
                                <td>` + detail[index].work_name + `</td>
                                <td>` + detail[index].budget + `</td>
                                <td>` + detail[index].realitation + `</td>
                                <td>` + detail[index].different + `</td>
                               </tr>`

                        }

                        html += `</tbody> </table>`

                        $('#previewData').modal('show')
                        $('#content-preview').html(html)
                    }
                })

            }
        })
    })
</script>