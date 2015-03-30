<?php
include "../.lib/bdd.php"; $type = $_GET['i'];
function c4e($code, $Cdate) { $cpt = "0"; for ($i = 0, $j = strlen($code); $i < $j; $i++) { $dec_array[] = ord($code{$i}); } foreach($dec_array as $dec_array) { $sommateur = $dec_array + $Cdate + $cpt; $melimelo_in = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9"); $melimelo_out = array("*", "8", "5", "3", "2", "1", "9", "6", "4", "7"); $melimelo = str_replace($melimelo_in, $melimelo_out,  $sommateur); $melimelo .= $melimelo; $cpt = $cpt + "888"; } return md5($melimelo); }
if($type == "mail") {
	if($_POST['new_mail'] == true) {

		$new_user_mail = $_POST['new_mail'];
		$mail = explode("@", $new_user_mail);

		$select0 = $connect->query("SELECT * FROM `".$tb1."` WHERE mail = '$new_user_mail' ");
		$select0->setFetchMode(PDO::FETCH_OBJ);
		$data0 = $select0->fetch();

		/* Param */
		$Cpseudo = $data0->pseudo;

		if($Cpseudo == true) {
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Adresse mail indisponible\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
		} else if($mail[1] == true) {
			$stmt = $connect->prepare("UPDATE `".$tb1."` SET mail = '".$new_user_mail."' WHERE id = '$user_id'");
			$stmt->execute();
			echo "<SCRIPT LANGUAGE=\"JavaScript\">parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
		} else {
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Adresse mail invalide\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
		}
	} else {
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Merci de renseigner une adresse mail\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
	}
 } else if($type == "mdp") {
	if(($_POST['new_mdp_1'] == true)&&($_POST['new_mdp_1'] == $_POST['new_mdp_2'])) {

		$dt1 = substr($user_date ,0,2);
		$dt2 = substr($user_date ,2,2);
		$dt3 = substr($user_date ,4,4);
		$dt4 = substr($user_date ,8,2);
		$dt5 = substr($user_date ,10,2);
		$dtol = $dt1 + $dt2 + $dt3 + $dt4+ $dt5;

		$call_mdp = c4e($_POST['new_mdp_1'], $dtol);

		$stmt = $connect->prepare("UPDATE `".$tb1."` SET pass = '".$call_mdp."' WHERE id = '$user_id'");
		$stmt->execute();
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Changement de mot de passe fait\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
	} else {
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Merci de renseigner tous les champs\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
	}
} else {
	echo "Laisse moi dormir...";
} ?>