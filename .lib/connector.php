<?php $type = $_GET['i']; ?>
<?php function c4e($code, $Cdate) { $cpt = "0"; for ($i = 0, $j = strlen($code); $i < $j; $i++) { $dec_array[] = ord($code{$i}); } foreach($dec_array as $dec_array) { $sommateur = $dec_array + $Cdate + $cpt; $melimelo_in = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9"); $melimelo_out = array("*", "8", "5", "3", "2", "1", "9", "6", "4", "7"); $melimelo = str_replace($melimelo_in, $melimelo_out,  $sommateur); $melimelo .= $melimelo; $cpt = $cpt + "888"; } return md5($melimelo); } ?>
<?php if($type == "1") { ?>
<form id="login">
	<input name="pseudo" type="text" placeholder="Nom d'utilisateur" value=""  />
	<input name="pass" type="password" placeholder="Mot de passe" value="" />
</form>
<?php } else if($type == "2") { ?>
<form id="register">
	<input name="pseudo" type="text" placeholder="Nom d'utilisateur" value="" />
	<input name="mail" type="text" placeholder="Adresse Mail" value="" />
	<input name="pass1" type="password" placeholder="Mot de passe" value="" />
	<input name="pass2" type="password" placeholder="Valider votre Mot de passe" value="" />
</form>
<?php } else if($type == "3") { ?>
<form id="reset">
	<input name="mail" type="text" placeholder="Adresse Mail" value="" />
</form>
<?php } else if($type == "login") { 

	include "bdd.php";

	$log_user_pseudo = strip_tags($_POST['pseudo']);
	$log_user_pass = strip_tags($_POST['pass']);

	$select = $connect->query("SELECT * FROM `".$tb1."` WHERE pseudo = '$log_user_pseudo' ");
	$select->setFetchMode(PDO::FETCH_OBJ);
	$data = $select->fetch();

	$Cid = $data->id;

	if(($Cid == true)&&($log_user_pass == true))
	{
		$Cpass = $data->pass;
		$Cdate = $data->date;

		$dt1 = substr($Cdate ,0,2);
		$dt2 = substr($Cdate ,2,2);
		$dt3 = substr($Cdate ,4,4);
		$dt4 = substr($Cdate ,8,2);
		$dt5 = substr($Cdate ,10,2);
		$dtol = $dt1 + $dt2 + $dt3 + $dt4+ $dt5;

		$call_mdp = c4e($log_user_pass, $dtol);

		if($call_mdp == $Cpass) {

			$session = md5($inscription_user_pseudo . date("YmdHis") . $inscription_user_mail);
			$stmt = $connect->prepare("UPDATE `".$tb1."` SET session = '".$session."', etat='1' WHERE id = '$Cid' ");
			$stmt->execute();
			setcookie("session", $session, "0", "/", $_SERVER['HTTP_HOST']);
			sleep(1);
			echo "01_OK";

		} else echo "01_3";

	} else {
		if(($Cid == false)&&($log_user_pseudo == true)&&($log_user_pass == true)) {
			echo "01_2";
		} else echo "01_1";
	}

} else if($type == "register") { 

	include "bdd.php";

	$inscription_user_pseudo = strip_tags($_POST['pseudo']);
	$inscription_user_mail = strip_tags($_POST['mail']);

	$select0 = $connect->query("SELECT * FROM `".$tb1."` WHERE pseudo = '$inscription_user_pseudo' ");
	$select0->setFetchMode(PDO::FETCH_OBJ);
	$data0 = $select0->fetch();

	$select = $connect->query("SELECT * FROM `".$tb1."` WHERE mail = '$inscription_user_mail' ");
	$select->setFetchMode(PDO::FETCH_OBJ);
	$data = $select->fetch();

	/* Param */
	$Cpseudo = $data0->pseudo;
	$Cmail = $data->mail;
	if(($_POST['pass1'] == $_POST['pass2'])&&($_POST['pass1'] != "")) $inscription_user_pass = strip_tags($_POST['pass1']);
	$mail = explode("@", $inscription_user_mail);

	if(($Cpseudo == false)&&($Cmail == false)&&($inscription_user_pass == true)&&($mail[1] == true))
	{
			$Cdate0 = date("d").date("m").date("Y").date("H").date("i");
			$Cdate = date("d") + date("m") + date("Y") + date("H") + date("i");
			$session = md5($inscription_user_pseudo . date("YmdHis"). $inscription_user_mail);
			$out_mdp = c4e($inscription_user_pass, $Cdate);
			$stmt = $connect->prepare("INSERT INTO `".$tb1."` VALUES('','$inscription_user_pseudo','$out_mdp','$Cdate0','$inscription_user_mail','','','0','','','1','10','$session','')");
			$stmt->execute();
			setcookie("session", $session, "0", "/", $_SERVER['HTTP_HOST']);
			sleep(1);
			echo "02_OK";
	} else { 
		if($Cpseudo == true) {
			echo "01_2"; 
		} else if($Cmail == true) {
			echo "01_3"; 
		} else if($inscription_user_pass != true) {
			echo "02_2"; 
		} else echo "02_1";
	}


} else if($type == "reset") { 

	include "bdd.php";

	$forget_mail = strip_tags($_POST['mail']);

	$select = $connect->query("SELECT * FROM `".$tb1."` WHERE mail = '$forget_mail' ");
	$select->setFetchMode(PDO::FETCH_OBJ);
	$data = $select->fetch();

	$Cpseudo = $data->pseudo;
	$Cid = $data->id;

	if(($Cid == true)&&($forget_mail == true))
	{

		// Génération d'une chaine aléatoire
		function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
		{
			$nb_lettres = strlen($chaine) - 1;
			$generation = '';
			for($i=0; $i < $nb_car; $i++)
			{
				$pos = mt_rand(0, $nb_lettres);
				$car = $chaine[$pos];
				$generation .= $car;
			}
		return $generation;
		}

		$Cpass = chaine_aleatoire(8);
		$Cdate = $data->date;

		// Mail
		$to = $forget_mail;
		$subject = 'Gabbler - Vos accès';
		$message = "Nom d'utilisateur : ".$Cpseudo." - Nouveau mot de passe : ".$Cpass;
		$headers = 'From: noreply@gabbler.com' . "\r\n" .
		'Reply-To: noreply@gabbler.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);

		$dt1 = substr($Cdate ,0,2);
		$dt2 = substr($Cdate ,2,2);
		$dt3 = substr($Cdate ,4,4);
		$dt4 = substr($Cdate ,8,2);
		$dt5 = substr($Cdate ,10,2);
		$dtol = $dt1 + $dt2 + $dt3 + $dt4+ $dt5;

		$call_mdp = c4e($Cpass, $dtol);

		$stmt = $connect->prepare("UPDATE `".$tb1."` SET pass = '".$call_mdp."' WHERE mail = '$forget_mail' ");
		$stmt->execute();
		sleep(1);
		echo "03_OK";

	} else {
		if(($Cid == false)&&($forget_mail == true)) {
			echo "01_2";
		} else echo "01_2";
	}


} ?>