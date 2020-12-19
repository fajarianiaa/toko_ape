<?php
//load konfig web
$site = $this->KonfigurasiModel->listing();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--=====================================icon========================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"/>
<!--=====================================SEO Google========================================================-->	
<meta name="keywords" content="<?php echo $site->keywords ?>">
<meta name="description" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template2/css/main.css">
<!--===============================================================================================-->

<style type="text/css" media="screen">
	ul.pagination {
		background-color : grey;
		text-align: center !important;
	}
	.pagination a, .pagination b {
		padding : 10px 20px;	
		text-decoration: none;
		float : left;
	}
	.pagination a{
		background-color : grey;
		color : white;
	}
	.pagination b{
		background-color : black;
		color : white;
	}
	.pagination a:hover{
		background-color : black;
		color : white;
	}
</style>
</head>
<body class="animsition">