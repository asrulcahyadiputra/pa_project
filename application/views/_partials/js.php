<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url() ?>assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>bootstrap/js/popper.min.js"></script>
<script src="<?= base_url() ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/currency.js"></script>
<script>
	$(document).ready(function() {
		App.init();
	});
</script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>
<script>
	$(document).ready(function() {
		$(".alert").fadeIn().delay(5000).fadeOut();
	});
</script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= base_url() ?>plugins/apex/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url() ?>plugins/table/datatable/datatables.js"></script>
<script>
	$('#zero-config').DataTable({
		"oLanguage": {
			"oPaginate": {
				"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
				"sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
			},
			"sInfo": "Showing page _PAGE_ of _PAGES_",
			"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
			"sSearchPlaceholder": "Search...",
			"sLengthMenu": "Results :  _MENU_",
		},
		"stripeClasses": [],
		"lengthMenu": [10, 25, 50, 100],
		"pageLength": 10
	});
</script>
<!-- END PAGE LEVEL SCRIPTS -->

	<!-- scritp dynamic form -->
	<script type="text/javascript">
        jQuery(document).delegate('a.add-record', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#sample_table tr'),
                size = jQuery('#tbl_posts >tbody >tr').length + 1,
                element = null,
                element = content.clone();

            element.attr('id', 'rec-' + size);
            element.find('.delete-record').attr('data-id', size);
            element.appendTo('#tbl_posts_body');
            element.find('.sn').html(size);
            element.find('.select2').select2();
            $("input[data-type='currency']").on({
                keyup: function() {
                    formatCurrency($(this));
                },
                blur: function() {
                    formatCurrency($(this), "blur");
                }
            });
        });
    </script>
    <script>
        jQuery(document).delegate('a.delete-record', 'click', function(e) {
            e.preventDefault();
            var didConfirm = confirm("Apakah Anda yakin untuk menghapus baris ?");
            if (didConfirm == true) {
                var id = jQuery(this).attr('data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-' + id).remove();

                //regnerate index number on table
                $('#tbl_posts_body tr').each(function(index) {
                    //alert(index);
                    $(this).find('span.sn').html(index + 1);
                });
                return true;
            } else {
                return false;
            }
        });
	</script>
	
	<script>
		$(document).ready(function(){
			$('#t_project_id').change(function(){
				var t_project_id = $('#t_project_id').val();
				var dp;
				$.ajax({
                    url: '<?= site_url('transaksi/kontrak/find_project') ?>',
                    type: 'POST',
					dataType:'JSON',
                    data: {
                        t_project_id: t_project_id,
                    },
                    success: function(data) {
						conversion = data.t_project_price*(30/100);
						dp = new Intl.NumberFormat('ja-JP').format(conversion);
						np = new Intl.NumberFormat('ja-JP').format(data.t_project_price);
                        $('#total').val('Rp '+np);
                        $('#nominal').val('Rp '+dp);
						$('#project_days').val(data.t_project_estimation);
                    }
                });
			});
		});
	</script>
</body>

</html>
