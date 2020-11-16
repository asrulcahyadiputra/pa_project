<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>CV Mangkubumi - <?= $title ?> </title>
	<link rel="icon" type="image/x-icon" href="assets/img/90x90.jpg" />
	<link href="<?= base_url() ?>assets/css/loader.css" rel="stylesheet" type="text/css" />
	<script src="<?= base_url() ?>assets/js/loader.js"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?= base_url() ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link href="<?= base_url() ?>plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="sidebar-noneoverflow">
	<!-- BEGIN LOADER -->
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>
	<!--  END LOADER -->

	<?php $this->load->view('_partials/navbar') ?>
	<?php $this->load->view('_partials/sidebar') ?>
	<!--  BEGIN MAIN CONTAINER  -->
