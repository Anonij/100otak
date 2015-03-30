<?php
include "../.lib/bdd.php";
include "../.functions/date.php";
include "../.functions/grade.php";
include "../.functions/gestion_user.php";
?>

<script>$(function() { $( "#tabs_users" ).tabs(); });</script>
 
<div id="tabs_users">
	<ul class="member_style_ul">
		<li class="member_style_li"><a href="#tabs-1"><i class="fa fa-user-plus"></i> Nouveaux Membres</a></li>
		<li class="member_style_li"><a href="#tabs-2"><i class="fa fa-user"></i> Membres</a></li>
		<li class="member_style_li"><a href="#tabs-3"><i class="fa fa-user-secret"></i> Staff</a></li>
	</ul>
	<div id="tabs-1">

	<?php

	$select1 = $connect->query("SELECT * FROM `".$tb1."` WHERE grade = '10' ORDER BY pseudo ASC");
	$select1->setFetchMode(PDO::FETCH_OBJ);
	$total1 = 0;

	while($enregistrement = $select1->fetch())
	{ 
		$total1++;
		?>

		<div class="member_style">
			<div>
				<?php if($enregistrement->avatar == true) { ?>
				<img class="member_style_0" src="./.users/.avatar/<?= md5($enregistrement->id); ?>.<?= $enregistrement->avatar; ?>" width="66" height="66" />
				<?php } else { ?>
				<img class="member_style_0" src="http://www.gravatar.com/avatar/<?= md5($enregistrement->mail); ?>/?d=mm&s=66" />
				<?php } ?>
			</div>
			<div><?= $enregistrement->pseudo; ?></div>
			<div class="htype_3"><?= otak_date($enregistrement->date); ?></div>
			<div class="htype_2"><?= otak_grade($enregistrement->grade); ?></div>
			<div style="position: absolute; top: 10px; right: 10px; font-size: 20px;">
				<?php eta_user($user_id, $enregistrement->id); ?>
				<span class="member_style_1" onclick="add_mp('<?= $enregistrement->id; ?>')"><i class="fa fa-envelope"></i></span>
				<span class="member_style_1" onclick="add_pop('<?= $enregistrement->id; ?>')"><i class="fa fa-child"></i></span>
			</div>
		</div>

		<?php 
	} if($total1 == 0) { ?>
		<div class="member_style htype_1 ">
			<i class="fa fa-exclamation" style="margin: 0 5px;"></i> Aucune entrée de disponible
		</div>
	<?php } ?>

	</div>
	<div id="tabs-2">

	<?php

	$select1 = $connect->query("SELECT * FROM `".$tb1."` WHERE grade >= '11' and grade <= '60' ORDER BY pseudo ASC");
	$select1->setFetchMode(PDO::FETCH_OBJ);
	$total1 = 0;

	while($enregistrement = $select1->fetch())
	{ 
		$total1++;
		?>

		<div class="member_style">
			<div>
				<?php if($enregistrement->avatar == true) { ?>
				<img class="member_style_0" src="./.users/.avatar/<?= md5($enregistrement->id); ?>.<?= $enregistrement->avatar; ?>" width="66" height="66" />
				<?php } else { ?>
				<img class="member_style_0" src="http://www.gravatar.com/avatar/<?= md5($enregistrement->mail); ?>/?d=mm&s=66" />
				<?php } ?>
			</div>
			<div><?= $enregistrement->pseudo; ?></div>
			<div class="htype_3"><?= otak_date($enregistrement->date); ?></div>
			<div class="htype_2"><?= otak_grade($enregistrement->grade); ?></div>
			<div style="position: absolute; top: 10px; right: 10px; font-size: 20px;">
				<?php eta_user($user_id, $enregistrement->id); ?>
				<span class="member_style_1" onclick="add_mp('<?= $enregistrement->id; ?>')"><i class="fa fa-envelope"></i></span>
				<span class="member_style_1" onclick="add_pop('<?= $enregistrement->id; ?>')"><i class="fa fa-child"></i></span>
			</div>
		</div>

		<?php 
	} if($total1 == 0) { ?>
		<div class="member_style htype_1 ">
			<i class="fa fa-exclamation" style="margin: 0 5px;"></i> Aucune entrée de disponible
		</div>
	<?php } ?>

	</div>
	<div id="tabs-3">

	<?php

	$select1 = $connect->query("SELECT * FROM `".$tb1."` WHERE grade >= '61' ORDER BY pseudo ASC");
	$select1->setFetchMode(PDO::FETCH_OBJ);
	$total1 = 0;

	while($enregistrement = $select1->fetch())
	{ 
		$total1++;
		?>

		<div class="member_style">
			<div>
				<?php if($enregistrement->avatar == true) { ?>
				<img class="member_style_0" src="./.users/.avatar/<?= md5($enregistrement->id); ?>.<?= $enregistrement->avatar; ?>" width="66" height="66" />
				<?php } else { ?>
				<img class="member_style_0" src="http://www.gravatar.com/avatar/<?= md5($enregistrement->mail); ?>/?d=mm&s=66" />
				<?php } ?>
			</div>
			<div><?= $enregistrement->pseudo; ?></div>
			<div class="htype_3"><?= otak_date($enregistrement->date); ?></div>
			<div class="htype_2"><?= otak_grade($enregistrement->grade); ?></div>
			<div style="position: absolute; top: 10px; right: 10px; font-size: 20px;">
				<?php eta_user($user_id, $enregistrement->id); ?>
				<span class="member_style_1" onclick="add_mp('<?= $enregistrement->id; ?>')"><i class="fa fa-envelope"></i></span>
				<span class="member_style_1" onclick="add_pop('<?= $enregistrement->id; ?>')"><i class="fa fa-child"></i></span>
			</div>
		</div>

		<?php 
	} if($total1 == 0) { ?>
		<div class="member_style htype_1 ">
			<i class="fa fa-exclamation" style="margin: 0 5px;"></i> Aucune entrée de disponible
		</div>
	<?php } ?>

	</div>
</div>

<script>
function add_user(id) {
	$("#js_act").load("./.functions/gestion_user.php?id=" + id + "&act=add");
	$("#user__" + id).remove();
}
function remove_user(id) { 
	$("#js_act").load("./.functions/gestion_user.php?id=" + id + "&act=remove"); 
	$("#user__" + id).remove();
}
function add_mp(id) {
	alert("Prochainement disponible... [id:" + id + "]");
}
function add_pop(id) {
	alert("Prochainement disponible... [id:" + id + "]");
}
</script>