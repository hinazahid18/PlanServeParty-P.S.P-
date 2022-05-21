<!-- plugins:js -->
<script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.select.min.js')?>"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
<script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
<script src="<?php echo base_url('assets/js/template.js')?>"></script>
<script src="<?php echo base_url('assets/js/settings.js')?>"></script>
<script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>
<script src="<?php echo base_url('assets/js/Chart.roundedBarCharts.js')?>"></script>
<!-- End custom js for this page-->
<script src="<?php echo base_url('assets/jquery.richtext.js')?>"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script>
    $(document).ready(function () {
        $('.content').richText();
    });
</script>
<link rel="stylesheet" href="<?php echo base_url('assets/rte_theme_default.css')?>">
<script type="text/javascript" src="<?php echo base_url('assets/rte.js')?>"></script>
<script>
			var editor1 = new RichTextEditor("#content");
			//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
		</script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> -->
<script>
    $(document).ready(function () {
        $('#table_categories').DataTable();
       
    });
    $(document).ready(function () {
        $('#table_vandor_order').DataTable();
    });
</script>

</body>

</html>