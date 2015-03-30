<?php
$imagePath = ".avatar/";

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES["img"]["name"]);
$extension = end($temp);
$path = ".avatar/".$_GET['id'].".".$extension;
	
if(!is_writable($imagePath)){
	$response = Array(
		"status" => 'error',
		"message" => 'Can`t upload File; no write Access'
	);
	print json_encode($response);
	return;
}
	
if ( in_array($extension, $allowedExts))
{
	if ($_FILES["img"]["error"] > 0)
	{
		 $response = array(
			"status" => 'error',
			"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
		);			
	}
	else
	{
		$filename = $_FILES["img"]["tmp_name"];
		list($width, $height) = getimagesize( $filename );
		move_uploaded_file($filename,  $path);
		include "../.lib/bdd.php";
		$stmt = $connect->prepare("UPDATE `".$tb1."` SET avatar = '".$extension."' WHERE id = '$user_id'");
		$stmt->execute();
		$response = array(
			"status" => 'success',
			"url" => ".users/".$path,
			"width" => $width,
			"height" => $height
		 );
	}
}
else
{
	$response = array(
		"status" => 'error',
		"message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
	);
}
print json_encode($response);
?>
