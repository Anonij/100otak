<?php 

/**
 * POST / GET anti SQL Injection
 *
 * @project: FilterClass
 * @purpose: This class anti SQL Injection
 * @version: 1.0
 *
 * @author: Niji Ano
 * @created on: 16 Mar, 2015
 *
 * @url: http://www.anoniji.com
 * @email: anoniji@outlook.com
 * @license: Creative Commons
 *
 */

foreach($_POST as $key => $value) {
	$exploded1 = explode("<", $value);
	$exploded2 = explode(">", $value);
	$exploded3 = explode("%", $value);
	$exploded4 = explode("?", $value);
	$exploded5 = explode("'", $value);

	if($exploded1[1] == true || $exploded2[1] == true || $exploded3[1] == true || $exploded4[1] == true || $exploded5[1] == true) {
		$IP = $_SERVER["REMOTE_ADDR"];
		$date = date('d-m-y @ H:i');
		$plus = $date.' - '.$IP.' - [injectSQL]';
		$monfichier = fopen('log.id', 'a+');
		fgets($monfichier); 
		fputs($monfichier, $plus);
		fputs($monfichier, "\n"); 
		fclose($monfichier);
		sendmail_to("@");
		die();
	}
}

foreach($_GET as $key => $value) {
	$exploded1 = explode("<", $value);
	$exploded2 = explode(">", $value);
	$exploded3 = explode("%", $value);
	$exploded4 = explode("?", $value);
	$exploded5 = explode("'", $value);

	if($exploded1[1] == true || $exploded2[1] == true || $exploded3[1] == true || $exploded4[1] == true || $exploded5[1] == true) {
		$IP = $_SERVER["REMOTE_ADDR"];
		$date = date('d-m-y @ H:i');
		$plus = $date.' - '.$IP.' - [injectSQL]';
		$monfichier = fopen('log.id', 'a+');
		fgets($monfichier); 
		fputs($monfichier, $plus);
		fputs($monfichier, "\n"); 
		fclose($monfichier);
		sendmail_to("@");
		die();
	}
}

function sendmail_to($to) {
		$subject = '100%otak - Protection SQL';
		$message = "Vous venez d'avoir une Injection SQL et le système la bloquée";
		$headers = 'From: noreply@100otak.com' . "\r\n" .
		'Reply-To: noreply@100otak.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
}

?>