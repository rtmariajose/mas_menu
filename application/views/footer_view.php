<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>/assets/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->  
<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>/assets/js/raphael-min.js"></script>
<!--<script src="<?php echo base_url();?>/assets/plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="<?php echo base_url();?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>/assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>/assets/js/moment.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- datatable -->
<script src="<?php echo base_url();?>/assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/datatables/jquery.dataTables.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- select2 -->
<script src="<?php echo base_url();?>/assets/plugins/select2/select2.js"></script>
<!-- typehead -->
<script src="<?php echo base_url();?>/assets/plugins/typehead/boostrap-typeahead.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>/assets/js/login/zindex.js"></script>
<?php

//  $this->assets->load_js();

if (isset($script)) {
    echo "\n";
	foreach ($script as $src) {
		if (!preg_match('/\<script.*/' , $src)) {			
			echo '<script type="text/javascript" src="'.$src.'"></script>';            
            echo "\n";
		} else {
			echo "\n";
			echo $src;
		}
	}
}
//cargarJS();

?>

</body>
</html>