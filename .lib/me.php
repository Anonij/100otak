<?php $type = $_GET['i']; ?>

<?php if($type == "2") { ?>

	<div id="nav_box_notif" class="event">

		<div class="event_id_1"><i class="fa fa-fw fa-calendar-o"></i> 
			<div style="margin: -45px 0 0 20px;">
				<span style="font-size: 10px;">Du 21 au 22/03/2015</span>
				<br/><span>Clermont Geek Convention</span>
			</div>
		</div>

		<div class="event_id_2"><i class="fa fa-fw fa-calendar-o"></i> 
			<div style="margin: -45px 0 0 20px;">
				<span style="font-size: 10px;">Du 18 au 19/04/2015</span>
				<br/><span>Cartoonist</span>
			</div>
		</div>

		<div class="event_id_3"><i class="fa fa-fw fa-calendar-o"></i> 
			<div style="margin: -45px 0 0 20px;">
				<span style="font-size: 10px;">Du 02 au 05/07/2015</span>
				<br/><span>Japan Expo Paris</span>
			</div>
		</div>

	</div>

	<hr>

<?php } else if($type == "3") { ?>

	<div id="nav_box_notif" class="notif">

	<?php
	include "bdd.php";
	include "../.functions/date.php";
	include "../.functions/icon.php";

	$select1 = $connect->query("SELECT * FROM `".$tb2."` WHERE target_id = '$user_id' ORDER BY 'date' DESC");
	$select1->setFetchMode(PDO::FETCH_OBJ);
	$total1 = 0;

	while($enregistrement = $select1->fetch())
	{ 
		$total1++;
		?>

		<div class="notif_id_<?= $enregistrement->id; ?>"><i class="fa fa-fw fa-<?= otak_icon($enregistrement->id); ?>"></i> 
			<div style="margin: -45px 0 0 20px;">
				<span style="font-size: 10px;"><?= otak_date($enregistrement->date); ?></span>
				<br/><span><?= utf8_encode($enregistrement->content); ?></span>
			</div>
		</div>

		<?php
	}
	if($total1 == 0) { ?>

	<div style='text-align: center; color: #fff; padding: 15px 0 10px;'><i style='font-size: 24px;' class='fa fa-bell'></i><span style='position: relative; top: -3px; font-size: 12px; padding-left: 5px;'>Pas de notification en attente</span></div>

	<?php } ?>

	<hr>

	<div>

<?php } else if($type == "5") { ?>

	<?php include "bdd.php"; include "../.functions/date.php"; ?>

	<script>$(function() { $( "#tabs" ).tabs(); }); </script>

	<div id="tabs" style="width: 366px;">
		<ul style="padding: 0 5px; margin: 0;">
			<li class="nav_box_menu_bt1" style="color: #fff; font-size: 26px;"><a href="#general"><i class="fa fa-newspaper-o"></i></a></li>
			<li class="nav_box_menu_bt1" style="color: #fff; font-size: 26px;"><a href="#notification"><i class="fa fa-bell"></i></a></li>
			<li class="nav_box_menu_bt1" style="color: #fff; font-size: 26px;"><a href="#mail"><i class="fa fa-at"></i></a></li>
			<li class="nav_box_menu_bt1" style="color: #fff; font-size: 26px;"><a href="#password"><i class="fa fa-lock"></i></a></li>
			<li class="nav_box_menu_bt1" style="color: #fff; font-size: 26px;"><a href="#avatar"><i class="fa fa-picture-o"></i></a></li>
			<li class="nav_box_menu_bt1" style="color: #fff; font-size: 26px;"><a href="#background"><i class="fa fa-desktop"></i></a></li>
		</ul>
		<div id="general">

			<hr>

			<div style='color: #fff; padding: 15px 15px 0;'><i style='font-size: 24px;' class='fa fa-paw'></i><span style='position: relative; top: -5px; font-size: 10px; padding-left: 10px;'><?= $user_session; ?></span></div>
			<div style='color: #fff; padding: 15px 15px;'><i style='font-size: 24px;' class='fa fa-calendar'></i><span style='position: relative; top: -3px; font-size: 12px; padding-left: 10px;'><?= otak_date($user_date); ?></span></div>
			<div style='position: absolute; top: 145px; right: 25px; color: #fff; border: 2px solid #fff; border-radius: 50%; width: 64px; height: 64px; line-height: 64px; text-align: center;'>LV <?= $user_lv; ?></div>

		</div>
		<div id="notification">

			<hr>

			<form id="notif" style="padding: 10px;">
				<select id="select_notif" name="notif" size="1" style="width: 314px;">
					<option value="0">Aucune</option>
					<option value="1">Dans la page</option>
					<option value="2">Navigateur</option>
					<option value="3">Page + Navigateur</option>
				</select>
				<input type="button" id="change_notif" name="change_notif" value="Changer le mode de notification" style="width: 314px; margin-bottom: 0;" />
			</form>
			<script>
			if(parseInt(localStorage["notifmode"]) >= 1) {
				$("#select_notif").val(parseInt(localStorage["notifmode"]));
			}
			$("#change_notif").click(function(){
				var notifmode = $("#select_notif").val();
				if(localStorage["notifmode"] == false) {
					localStorage.setItem("notifmode", notifmode);
				} else {
					localStorage["notifmode"] = notifmode;
				}
				alert("Changemement de mode enregistré");
			});
			</script>

		</div>
		<div id="mail">

			<hr>

			<form id="mail" method="post" action="./.users/functions.php?i=mail" style="padding: 10px;">
				<input id="new_mail" name="new_mail" type="text" value="<?= $user_mail; ?>" />
				<input type="submit" id="change_mail" name="change_mail" value="Changer mon adresse mail" style="width: 314px; margin-bottom: 0;" />
			</form>

		</div>
		<div id="password">

			<hr>

			<form id="mdp" method="post" action="./.users/functions.php?i=mdp" style="padding: 10px;">
				<input id="new_mdp_1" name="new_mdp_1" type="password" value="" placeholder="Nouveau mot de passe" />
				<input id="new_mdp_2" name="new_mdp_2" type="password" value="" placeholder="Confirmation" />
				<input type="submit" id="change_mail" name="change_mail" value="Changer mon mot de passe" style="width: 314px; margin-bottom: 0;" />
			</form>

		</div>
		<div id="avatar">

			<hr>

			<?php if($user_avatar== true) { ?>
			<form id="avatar_form" method="post" action="./.users/upload.php" enctype="multipart/form-data" style="padding: 10px;">
				<input type="submit" id="avatar_remove" name="avatar_remove" value="Repasser sous Gravatar" style="width: 314px; margin-bottom: 0;" />
			</form>
			<?php } else { ?>
			<div id="avatar_c" style="margin: 15px auto;"></div>
			<style>#avatar_c, #cropContainerHeader { width: 250px; height: 250px; position:relative; background-image: url(http://www.gravatar.com/avatar/<?= md5($user_mail); ?>/?d=mm&s=250); }</style>
			<script>
			var cropperOptions = {
				uploadUrl:'./.users/img_save_to_file.php?id=<?= md5($user_id); ?>',
				cropUrl:'./.users/img_crop_to_file.php?id=<?= md5($user_id); ?>', 
				outputUrlId:'cropOutput',
				modal:false,
				onAfterImgCrop: function(){ location.reload(); },
				onError: function(errormsg){ console.log('onError:'+errormsg) },
				loaderHtml:'<div class="loader loader_fa"><i class="fa fa-cog fa-spin"></i> envoie en cours...</div> '
			}		
			var cropperHeader = new Croppic('avatar_c', cropperOptions);
			</script>
			<?php } ?>

		</div>
		<div id="background">

			<hr>

			<form id="wallpaper" method="post" action="./.users/upload.php" enctype="multipart/form-data" style="color: #fff;padding: 10px;">
				<?php if($user_background == true) { ?>
				<input type="submit" id="wallpaper_remove" name="wallpaper_remove" value="Retirer mon fond d'écran" style="width: 314px; margin-bottom: 0;" />
				<?php } else { ?>
				<div id="wallpaper_upload_div">
					<input name="ufile_wallpaper" type="file" id="ufile_wallpaper" size="20" accept="image/*" />
					<input type="submit" id="wallpaper_upload" name="wallpaper_upload" value="Changer le fond d'écran" style="width: 314px; margin-bottom: 0;" />
				</div>
				<?php } ?>
			</form>

		</div>
	</div>

	<hr>

<?php } else if($type == "6") { ?>
	<div style='text-align: center; color: #fff; padding: 15px 0;'><i style='font-size: 24px;' class='fa fa-power-off'></i><span style='position: relative; top: -3px; font-size: 12px; padding-left: 5px;'>Déconnexion en cours...</span></div><hr>
	<script>parent.location.href="http://<?= $_SERVER['HTTP_HOST']; ?>/logout.php"</script>
<?php } else { ?>
	<div style='text-align: center; color: #fff; padding: 15px 0;'><i style='font-size: 24px;' class='fa fa-times'></i><span style='position: relative; top: -3px; font-size: 12px; padding-left: 5px;'>Module indisponible</span></div><hr>
<?php } ?>
