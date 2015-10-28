<?php
/*
100%otak' - Version 0 rev0.2
*/

// Multilangue
include './.lang/check.php';

// BDD
include './.lib/bdd.php';

// Color
include './.lib/color.php';

// Define
$request_uri = $_GET['type'];
?>
<!doctype html>
<html lang="<?= $lang; ?>">
<head>
	<title>100%otak</title>

	<!-- meta -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />
	<meta name="description" content="<?= $description; ?>" />

	<!-- link -->

	<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/logo_64_shadow.png">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/css/bootstrap-theme.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/css/jquery-te-1.4.0.css" media="screen">

	<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/jquery-1.11.3.min.js"></script>
	<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/jquery-ui-1.11.4.min.js"></script> 
	<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/jquery-te-1.4.0.min.js"></script>
	<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/base64.min.js"></script> 

	<style>
	html,body {
		height: 100%;
		margin: 0;
		background-color: #<?= color_random(); ?>;
	}
	.progress { position: fixed; left: 0; bottom: 20px; right: 0; height: 5px; border-top: 1px solid #000; }
	#progress { background: #<?= color_random(); ?> !important; }
	#title, header {
		font-weight: bold;
		color: #fff;
		text-shadow: 0 0 2px rgba(0,0,0,0.6);
	}
	section {
		height: 100%;
		padding-bottom: 40px;
	}
	.footer {
		position: fixed;
		bottom: 0;
		width: 100%;
		z-index: 100;
		height: 40px;
		border-top: 1px solid #<?= color_random(); ?>;
		background-color: #<?= color_random(); ?>;
	}
	.container .text-muted, .container a {
		font-weight: bold;
		color: #fff;
		text-shadow: 0 0 2px rgba(0,0,0,0.6);
		margin: 10px 0;
	}
	.list-group-item-nofirst {
		border-top: 0;
		border-top-left-radius: 0 !important;
		border-top-right-radius: 0 !important;
	}

	.forum_col a { text-shadow: none !important; }

	.forum_col_h1 { position: relative; clear: both; height: 26px; }
	.forum_col { position: absolute; top: 2px; }
	.forum_col_row { position: relative; clear: both; height: 48px; }
	.forum_col1 { left: 1%; right: 56%; }
	.forum_col1_icone { float: left; position: relative; top: 1px; left: -5px; font-size: 20px; }
	.forum_col2 { left: 44%; right: 46%; }
	.forum_col3 { left: 54%; right: 36%; }
	.forum_col4 { left: 64%; right: 1%; }
	.forum_col_hr { position: relative; clear: both; height: 8px; }

	// Surcouche menu
	.navbar-default, .navbar-fixed-top { border: none; box-shadow: none; background-color: transparent !important; }
	.navbar-collapse, .navbar-toggle { background: #fff; }
	#navbar { position: fixed; top: 0px; left: 0px !important; right: 0px !important; margin: 0 !important; padding: 0 15px !important; }
	.navbar-header { float: none; }
	.navbar-toggle { position: fixed; top: -5px; right: -10px; display: block !important; z-index: 1000000; }
	.navbar-collapse { border-top: 1px solid transparent; box-shadow: inset 0 1px 0 rgba(255,255,255,0.1); }
	.navbar-collapse.collapse { display: none!important; margin: 0 !important; padding: 0 15px !important; }
	.navbar-nav { float: none !important; margin: 7.5px -15px; }
	.navbar-nav>li { float: left; }
	.navbar-nav>li>a { padding-top: 10px; padding-bottom: 10px; }
	.navbar-text { float: none; margin: 15px 0; }
	.navbar-collapse.collapse.in { display: block !important; }
	.collapsing { overflow: hidden; }
	</style>

</head>
<body role="document">
	<?php $request_uri = $_GET['type']; if((($request_uri == true)&&($request_uri != "new_member"))||(($request_uri == false)&&($user_id == true))) include ".page/menu.php"; ?>

	<?php include ".page/header.php"; ?>

	<section class="container theme-showcase text-center" role="main">

	<?php
	if($user_id == true) {

		
		if($request_uri == "new_member") { include ".page/home.php"; echo "<style>section { overflow: hidden; }</style>"; }
		else if($request_uri == true) include ".page/".$request_uri.".php";
		else include ".page/home.php";

	} else {


		if($request_uri == true) include ".page/".$request_uri.".php";
		else include ".page/login.php";

	} ?>

	</section>

	<?php include ".page/footer.php"; ?>
  
	<script src="http://<?= $_SERVER['HTTP_HOST']; ?>/js/bootstrap.min.js"></script>
</body>
</html>