<?php include "../.lib/bdd.php";
if($user_id == true) {
	$wordsearch = base64_decode($_GET['s']);

	$select1 = $connect->query("SELECT * FROM `".$tb1."` WHERE `pseudo` LIKE '%".$wordsearch."%' ORDER BY `pseudo` ASC");
	$select1->setFetchMode(PDO::FETCH_OBJ);
	$total1 = 0;

	while($enregistrement = $select1->fetch())
	{ 
		if($enregistrement->id != $user_id) {
		$total1++;
		?>

			<div class="<?php if($enregistrement->id_creator == $user_id) { ?>msg_me<?php } ?> cover_msg_style">
					<?php if($enregistrement->avatar == true) { ?>
					<img style="float: left; cursor: pointer; position: relative; z-index: 10;" onclick="profile('<?= $enregistrement->pseudo; ?>');" src="./.users/.avatar/<?= md5($enregistrement->id); ?>.<?= $enregistrement->avatar; ?>" width="56" height="56" />
					<?php } else { ?>
					<img style="float: left; cursor: pointer; position: relative; z-index: 10;" onclick="profile('<?= $enregistrement->pseudo; ?>');" src="http://www.gravatar.com/avatar/<?= md5($enregistrement->mail); ?>/?d=mm&s=56" />
					<?php } ?>
					<div style="position:relative; left: 5px; top: 3px; font-size: 20px;">
						<span style="font-weight: bold; cursor: pointer;" onclick="profile('<?= $enregistrement->pseudo; ?>');"><?= $enregistrement->pseudo; ?></span><br />
						
					</div>
					<?php
						$enregistrement_msg = preg_replace('#http(s?)://[a-z0-9._/-?=]+#i', '<a href="$0" target="_blank">$0</a>', $enregistrement->msg);
					?>
					<?= str_replace($bbcode_input, $bbcode_output, $enregistrement_msg); ?>
					<?php if($enregistrement->id_creator != $user_id) { ?>
					<div style="text-align: left; position: relative; top: 3px; left: -8px; font-size: 12px;">
						<span style="background: #ebebeb; position: relative; top: 3px; right: -8px; padding: 5px; font-size: 20px;">
						<?php if($follow == true) { ?>
							<i class="fa fa-user-times fa-border" style="cursor: pointer;"></i> <span style="position: relative; top: -2px; font-size: 12px;">Retirer de mes amis</span>
						<?php } else { ?>
							<i class="fa fa-user-plus fa-border" style="cursor: pointer;"></i> <span style="position: relative; top: -2px; font-size: 12px;">Ajouter à mes amis</span>
						<?php } ?>
						</span>
					</div>
					<?php } else { ?>
					<div style="text-align: left; position: relative; top: 3px; left: -13px; font-size: 12px;">
						<span style="position: relative; top: 3px; right: -8px; padding: 5px; font-size: 12px;">
							<i class="fa fa-thumbs-o-up fa-border" style="cursor: default;"><span style="float: right; font-size: 10px; position: relative; top: -2px; right: -3px;">(<?= $result30; ?>)</span></i> <i class="fa fa-thumbs-o-down fa-border" style="cursor: default;"><span style="float: right; font-size: 10px; position: relative; top: -2px; right: -3px;">(<?= $result40; ?>)</span></i>
						</span>
					</div>
					<?php } ?>
			</div>

		<?php } 
	} ?>

	<?php if($total1 == 1) { ?>
		<script>
			$("#content").css("background", "#ebebeb");
			$(".gabs_count").html("1 résultat");
		</script>
	<?php } else if($total1 != 0) { ?>
		<script>
			$("#content").css("background", "#ebebeb");
			$(".gabs_count").html("<?= $total1; ?> résultats");
		</script>
	<?php } else { ?>
		<script>
			$("#content").css("background", "transparent");
			$(".gabs_count").html("0 résultat");
		</script>
	<?php } ?>

	<?php if($_GET['s'] == false) { ?>
		<script>
			$("#content").css("background", "transparent");
			$("#content").load("./.lib/home.php"); 
			$(".gabs_count").html("0 résultat");
		</script>
	<?php } ?>

<?php } ?>