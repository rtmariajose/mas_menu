<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/morris/morris.css">
  <!-- datatable -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/datatables/jquery.dataTables.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- select 2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/select2/select2.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php
   // $this->assets->load_css();

	if (isset($css)) {

		foreach ($css as $row) {
     
			if (!preg_match('/\<link.*/', $row)) {
				echo "\n";
				echo '<link rel="stylesheet" href="' . $row . '" />';
			} else {
				echo "\n";
				echo $row;
			}
		}
		echo "\n";
	}
	//cargarCSS();
	?>

</head>
<body>




