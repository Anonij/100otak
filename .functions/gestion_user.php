<?php
/**
 * gestion_user
 *
 * @project: Function add / remove
 * @version: 1.0
 *
 * @author: Niji Ano
 * @created on: 25 Mar, 2015
 *
 * @url: http://www.anoniji.com
 * @email: anoniji@outlook.com
 * @license: Creative Commons
 *
 */

function add_user($id) {
	include "../.lib/bdd.php";
	if($user_id == true) {
		$select = $connect->query("SELECT * FROM `".$tb3."` WHERE id_user = '$user_id' and id_target = '$id' "); $select->setFetchMode(PDO::FETCH_OBJ); $data = $select->fetch(); $Cid = $data->id;
		if($Cid == false) {
			$stmt = $connect->prepare("INSERT INTO `".$tb3."` VALUES('','$user_id','$id')"); $stmt->execute(); 
			echo "add_user::ok";
		} else {
			echo "add_user::error";
		}
	}
}

function remove_user($id) {
	include "../.lib/bdd.php";
	if($user_id == true) {
		$select = $connect->query("SELECT * FROM `".$tb3."` WHERE id_user = '$user_id' and id_target = '$id' "); $select->setFetchMode(PDO::FETCH_OBJ); $data = $select->fetch(); $Cid = $data->id;
		if($Cid == true) {
			$stmt = $connect->prepare("DELETE FROM `".$tb3."` WHERE id = '$Cid' "); $stmt->execute(); 
			echo "remove_user::ok";
		} else {
			echo "remove_user::error";
		}
	}
}

function eta_user($id1, $id2) {
	include "./.lib/class.protect.sql.php";
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

	if($id1 != $id2) {

		$select = $connect->query("SELECT * FROM `friends` WHERE id_user = '$id1' and id_target = '$id2' "); $select->setFetchMode(PDO::FETCH_OBJ); $data = $select->fetch(); $Cid = $data->id;
		if($Cid == false) {
			print_r('<span id="user__'.$id2.'" class="member_style_1" onclick="add_user(');
			print_r("'".$id2."'");
			print_r(')"><i class="fa fa-user-plus"></i></span>');
		} else { 
			print_r('<span id="user__'.$id2.'" class="member_style_1" onclick="remove_user(');
			print_r("'".$id2."'");
			print_r(')"><i class="fa fa-user-times"></i></span>');
		}

	}
}

$act = $_GET['act'];
$type = $_GET['id'];
if(($act == "add")&&($type == true)) add_user($type);
if(($act == "remove")&&($type == true)) remove_user($type);
?>