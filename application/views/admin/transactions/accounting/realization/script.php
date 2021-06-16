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
                //     'targets': [2],
                //     'className': 'text-right',
                //     'render': $.fn.dataTable.render.number('.', ',', 0, '')
                // },
                {
                    'targets': [3],
                    data: null,
                    'defaultContent': '<input class="form-control" name="realization[]" data-type="currency"/>'
                }
            ],

            columns: [{
                    data: 'work_id'
                },
                {
                    data: 'work_name'
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
        // $('#btn-save').on('click', function() {
        //     var data = myTable.rows().data()
        //     var data2 = myTable.$('input, select').serialize();
        //     console.log(data2)
        // })
    })
</script>