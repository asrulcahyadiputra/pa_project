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
            columnDefs: [{
                'targets': [2, 3],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            }],
            columns: [{
                    data: 'work_id'
                },
                {
                    data: 'work_name'
                },
                {
                    data: 'budget'
                },
                {
                    data: 'budget'
                }
            ]
        });


        $('#proyek').on('change', function() {
            var trans_id = $('#proyek').val()
            var html = ''
            console.log(trans_id)
            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/realisasi/fetch') ?>',
                dataType: 'JSON',
                data: {
                    trans_id: trans_id
                },
                success: function(data) {
                    console.log(data)
                    myTable.clear().draw()
                    var res = data.detail
                    console.log(res)
                    if (res.length > 0) {
                        myTable.rows.add(res).draw(false);
                        buttonSave.show()
                        console.log('data here')
                    } else {
                        myTable.clear().draw()
                        alert('Proyek Harus di pilih')
                        buttonSave.hide()
                    }

                }

            })
        })
    })
</script>