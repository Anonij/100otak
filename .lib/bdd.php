<?php
// Connection au serveur
try {
	$base = '';
	$user = "";
	$pass = "";
	$connect = new PDO($base, $user, $pass);

} catch ( Exception $e ) {
	echo "Connection à MySQL impossible : ", $e->getMessage();
	die();
}

$tb1 = "";
$tb2 = "";
$tb3 = "";
$user_session = $_COOKIE["session"];

include "class.protect.sql.php";

if(($user_session == true)&&($user_session != "")) { 
	$Cselect = $connect->query("SELECT * FROM `".$tb1."` WHERE session = '$user_session' ");
	$Cselect->setFetchMode(PDO::FETCH_OBJ);
	$enregistrement = $Cselect->fetch();
	if( $enregistrement )
	{
		// Definition user
		$user_id = $enregistrement->id;
		$user_pseudo = $enregistrement->pseudo;
		$user_date = $enregistrement->date;
		$user_mail = $enregistrement->mail;
		$user_avatar = $enregistrement->avatar;
		$user_background = $enregistrement->background;
		$user_pop = $enregistrement->pop;
		$user_id_last_pop_user = $enregistrement->id_last_pop_user;
		$user_id_last_pop_id = $enregistrement->id_last_pop_id;
		$user_lv = $enregistrement->lv;
		$user_grade = $enregistrement->grade;
		$user_session = $enregistrement->session;
	}
}
?>