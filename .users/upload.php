<?php
include "../.lib/bdd.php";

if(($_POST['avatar_upload'] == true)||($_POST['wallpaper_upload'] == true)) {

	if($_POST['avatar_upload'] == true) { $file = $_FILES['ufile_avatar']['tmp_name']; $extension = end(explode('.', $_FILES['ufile_avatar']['name'])); $path= ".avatar/".md5($user_id).".".$extension; $msg = "Avatar mise à jour"; }
	if($_POST['wallpaper_upload'] == true) { $file = $_FILES['ufile_wallpaper']['tmp_name'];$extension = end(explode('.', $_FILES['ufile_wallpaper']['name'])); $path= ".background/".md5($user_id).".".$extension; $msg = "Fond d'écran mise à jour"; }

	if((($ufile_avatar !=none)||($ufile_wallpaper !=none))&&(($extension == "gif")||($extension == "jpg")||($extension == "png"))) {
		if(move_uploaded_file($file,$path))
		{
			if($_POST['avatar_upload'] == true) { $stmt = $connect->prepare("UPDATE `".$tb1."` SET avatar = '".$extension."' WHERE id = '$user_id'"); $stmt->execute(); }
			if($_POST['wallpaper_upload'] == true) { $stmt = $connect->prepare("UPDATE `".$tb1."` SET background = '".$extension."' WHERE id = '$user_id'"); $stmt->execute(); } 
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"".$msg."\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']."/#params \" </SCRIPT>";
		}
	} else if(($extension != "gif")&&($extension != "jpg")&&($extension != "png")) {
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Seul les JPG, PNG et GIF sont acceptés.\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
	} else {
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"Merci de sélectionner un fichier.\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
	}
}

if(($_POST['avatar_remove'] == true)||($_POST['wallpaper_remove'] == true)) {
	if($_POST['avatar_remove'] == true) { $path= ".avatar/".md5($user_id).".".$user_avatar; $msg = "Avatar supprimé"; $stmt = $connect->prepare("UPDATE `".$tb1."` SET avatar = '".$extension."' WHERE id = '$user_id'"); $stmt->execute(); }
	if($_POST['wallpaper_remove'] == true) { $path= ".background/".md5($user_id).".".$user_background; $msg = "Fond d'écran supprimé"; $stmt = $connect->prepare("UPDATE `".$tb1."` SET background = '".$extension."' WHERE id = '$user_id'"); $stmt->execute(); }
	unlink($path);
	echo "<SCRIPT LANGUAGE=\"JavaScript\">alert(\"".$msg."\"); parent.location.href=\"http://".$_SERVER['HTTP_HOST']." \" </SCRIPT>";
}
?>