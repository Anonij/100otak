<?php
	setcookie("session", "", "0", "/", $_SERVER['HTTP_HOST']);
	sleep(1);

	include "./.lib/bdd.php";
	if($user_id == true) {
		$stmt = $connect->prepare("UPDATE `".$tb1."` SET etat = '0' WHERE id = '$user_id' ");
		$stmt->execute();
	}

	sleep(1);

	echo "<SCRIPT LANGUAGE=\"JavaScript\">parent.location.href=\"http://".$_SERVER['HTTP_HOST']."/ \" </SCRIPT>";
?>