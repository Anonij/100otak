<?php
/*
100%otak' - LOadeur rev0.2
*/

// Multilangue
include './.lang/check.php';

// BDD
include './.lib/bdd.php';

// Pages
$request_uri = $_GET['type'];
if($request_uri == true) include ".page/".$request_uri.".php";
else include ".page/home.php";
?>