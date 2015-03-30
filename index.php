<?php
include './.lib/bdd.php';
include './.functions/grade.php'; 
?>
<!doctype html>
<html lang="fr">
<head>
	<title>100%otak</title>

	<!-- meta -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />

	<!-- link -->

	<link rel="shortcut icon" href="logo_64_shadow.png">
	<link rel="stylesheet" type="text/css" href="css/globale.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/croppic.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery-ui-1.11.2.min.js"></script>
	<script src="js/jquery.ba-throttle-debounce.min.js"></script>
	<script src="js/croppic.min.js"></script>    

</head>

<body>

	<nav id="menu">
		<div id="menu_logo"><img src="logo_64_shadow.png" /></div>
		<div id="menu_logo_txt">
			100%otak
			<div>La communauté Tsundere 100% otaku</div>
		</div>
        		<div id="menu_site">
			<ul>
				<li id="menu-0">
					<a href="#home" class="current"><i class="fa fa-home"></i></a>
				</li>
				<li id="menu-1">
					<a href="#news"><i class="fa fa-newspaper-o"></i></a>
				</li>
				<li id="menu-2">
					<a href="#ideas"><i class="fa fa-lightbulb-o"></i></a>
				</li>
				<li id="menu-3">
					<a href="#forum"><i class="fa fa-comments"></i></a>
				</li>
				<li id="menu-4">
					<a href="#users"><i class="fa fa-users"></i></a>
				</li>
				<li id="menu-5">
					<a href="#search"><i class="fa fa-search"></i></a>
				</li>
				<li id="menu-6">
					<a href="#help"><i class="fa fa-question"></i></a>
				</li>
			</ul>
		</div>
        		<div id="menu_user">
			<?php if($user_id == true) { ?>
				<?php if($user_avatar == true) { ?>
				<img style="position: relative; top: 9px; right: -9px; border: 2px solid #fff; border-radius: 2px;" src="./.users/.avatar/<?= md5($user_id); ?>.<?= $user_avatar; ?>" width="40" height="40" />
				<?php } else { ?>
				<img style="position: relative; top: 9px; right: -9px; border: 2px solid #fff; border-radius: 2px;" src="http://www.gravatar.com/avatar/<?= md5($enregistrement->mail); ?>/?d=mm&s=40" />
				<?php } ?>
			<?php } else { ?>
			<i class="fa fa-sign-in"></i>
			<?php } ?>
		</div>
	</nav >

	<nav id="nav_box">
		<div class="tri"></div>
		<div class="error" style="position: relative; font-size: 20px;"></div>
		<?php if($user_id == true) { ?>
		<div style='color: #fff; padding: 0 0 15px;'>
			<?php if($user_avatar == true) { ?>
			<img style="float: left; position: relative; top: 9px; left: 9px; border: 2px solid #fff; border-radius: 2px;" src="./.users/.avatar/<?= md5($user_id); ?>.<?= $user_avatar; ?>" width="40" height="40" />
			<?php } else { ?>
			<img style="float: left; position: relative; top: 9px; left: 9px; border: 2px solid #fff; border-radius: 2px;" src="http://www.gravatar.com/avatar/<?= md5($enregistrement->mail); ?>/?d=mm&s=40" />
			<?php } ?>
			<div style="position: relative; top: 10px; left: 15px; font-size: 24px;">
				<div><?= $user_pseudo; ?> <span style='position: relative; top: -4px; font-size: 12px;'>[<i class="fa fa-child"></i> <?= $user_pop; ?>]</span></div>
				<div style='position: relative; top: -1px; font-size: 12px; padding-left: 5px;'><?= otak_grade($user_grade); ?></div>
			</div>
			<hr style="position: relative; top: 17px;">				
		</div>
		<?php } ?>
		<div class="load">
			<?php if($user_id != true) { ?>
			<form id="login">
				<input name="pseudo" type="text" placeholder="Nom d'utilisateur" value="" />
				<input name="pass" type="password" placeholder="Mot de passe" value="" />
			</form>
			<?php } ?>
		</div>
		<div id="nav_box_menu">
			<?php if($user_id == true) { ?>
			<div id="nav_box_menu_bt_1" class="user nav_box_menu_bt1"><i class="fa fa-user"></i></div>
			<div id="nav_box_menu_bt_2" class="calendar nav_box_menu_bt1"><i class="fa fa-calendar-o"></i></div>
			<div id="nav_box_menu_bt_3" class="bell nav_box_menu_bt1"><i class="fa fa-bell"></i></div>
			<div id="nav_box_menu_bt_4" class="pencil nav_box_menu_bt1"><i class="fa fa-pencil"></i></div>
			<div id="nav_box_menu_bt_5" class="cog nav_box_menu_bt1"><i class="fa fa-cog"></i></div>
			<div id="nav_box_menu_bt_6" class="power-off nav_box_menu_bt1"><i class="fa fa-power-off"></i></div>
			<?php } else { ?>
			<div id="nav_box_menu_bt_1" class="login nav_box_menu_bt"><i class="fa fa-sign-in"></i></div>
			<div id="nav_box_menu_bt_2" class="register nav_box_menu_bt"><i class="fa fa-pencil-square-o"></i></div>
			<div id="nav_box_menu_bt_3" class="reset nav_box_menu_bt"><i class="fa fa-life-ring"></i></div>
			<?php } ?>
		</div>
	</nav>

	<section class="section section-0" id="home">
		<div class="head">Accueil</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>
	<section class="section section-1" id="news">
		<div class="head">Actualités</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>
	<section class="section section-2" id="ideas">
		<div class="head">Liste d'idées</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>
	<section class="section section-3" id="forum">
		<div class="head">Forum</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>
	<section class="section section-4" id="users">
		<div class="head">Membres</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>
	<section class="section section-5" id="search">
		<div class="head">Rechercher</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>
	<section class="section section-6" id="help">
		<div class="head">A propos de...</div>
		<div class="content">
			<div class="big-fa"><i class="big-fa fa  fa fa-square-o"></i><div><span class="loader loader-double"></span></div></div>
		</div>
	</section>

	<div id="flux">
		<div class="flux_twitter"><i class="fa fa-fw fa-twitter"></i> <span>Nouveau Tweet</span></div>
		<div class="flux_annonce"><i class="fa fa-fw fa-bullhorn"></i> <span>Nouvelle annonce générale</span></div>
		<div class="flux_event"><i class="fa fa-fw fa-calendar"></i> <span>Un nouvel évènement est disponible</span></div>
		<div class="flux_article"><i class="fa fa-fw fa-newspaper-o"></i> <span>Un nouvel article</span></div>
		<div class="flux_user"><i class="fa fa-fw fa-user"></i> <span>Une nouvelle personne vous suit</span></div>
		<div class="flux_pop"><i class="fa fa-fw fa-child"></i> <span>Quelqu'un vient de "pop" un de vos articles</span></div>
		<div class="flux_lvup"><i class="fa fa-fw fa-level-up"></i> <span>Vous avez gagné un niveau</span></div>
		<div class="flux_lvdown"><i class="fa fa-fw fa-level-down"></i> <span>Vous avez été rétrogradé</span></div>
		<div class="flux_grade"><i class="fa fa-fw fa-graduation-cap"></i> <span>Vous avez obtenu un nouveau grade</span></div>
		<div class="flux_fonction"><i class="fa fa-fw fa-unlock-alt"></i> <span>Vous avez débloqué une nouvelle fonction</span></div>
		<div class="flux_commentaire"><i class="fa fa-fw fa-comment"></i> <span>Vous avez reçu une réponse</span></div>
		<div class="flux_ban"><i class="fa fa-fw fa-thumbs-down"></i> <span>Vous avez été bannis, ce n'est qu'un au revoir mon ami</span></div>
	</div>

	<div id="js_act"></div>

	<div id="scroll_div" style="color: #fff;">
		<div class="big-fa"><div style="position: fixed; top: 50%; left: 50%; margin: -24px 0 0 -24px;"><span class="loader loader-double"></span></div></div>
	</div>

	<script>

	<?php if($user_id == true) { ?>
	(function($){
		var connector = "";
		$("#nav_box_menu div").click(function(){
			$("#nav_box .error").html('');
			connector = "./.lib/me.php?i=" + $(this).attr('id').split("_", 5)[4];
			$("#nav_box .load").load(connector, 
				function(response, status, xhr) {
					if(status == "error") {
						$("#nav_box .load").html("<div style='text-align: center; color: #fff; padding: 15px 0;'><i style='font-size: 24px;' class='fa fa-times'></i><span style='position: relative; top: -3px; font-size: 12px; padding-left: 5px;'>Module indisponible</span></div><hr>");
					}
				}
			);
		});
	})(jQuery);
	<?php } else { ?>
	(function($){
		var connector = "";
		$("#nav_box_menu div").click(function(){
			if($("#nav_box .load form").attr('id') == $(this).attr('class').split(" ", 2)[0]) {
				connector = "./.lib/connector.php?i=" + $("#nav_box .load form").attr('id');
				$.post( connector , $( "#" + $("#nav_box .load form").attr('id') ).serialize() ).done(function( data ) {
				 	var testOK = $.trim(data)
				 	console.log($("#nav_box_menu div").attr('id'));

					if(testOK == "01_1") $("#nav_box .error").html('<i class="form_error form_error_1 fa fa-exclamation-circle"></i><i class="form_error form_error_2 fa fa-exclamation-circle"></i>');
					else if(testOK == "01_2") $("#nav_box .error").html('<i class="form_error form_error_1 fa fa-exclamation-circle"></i>');
					else if(testOK == "01_3") $("#nav_box .error").html('<i class="form_error form_error_2 fa fa-exclamation-circle"></i>');
					else if(testOK == "01_OK") {
						$("#nav_box_menu").css("color", "#33363b");
						$("#nav_box .error").html('<i class="form_error form_error_ok form_error_1 fa fa-check"></i>');
						parent.location.href="http://<?= $_SERVER['HTTP_HOST']; ?>";
					}
					else if(testOK == "02_1") $("#nav_box .error").html('<i class="form_error form_error_1 fa fa-exclamation-circle"></i><i class="form_error form_error_2 fa fa-exclamation-circle"></i><i class="form_error form_error_3 fa fa-exclamation-circle"></i><i class="form_error form_error_4 fa fa-exclamation-circle"></i>');
					else if(testOK == "02_2") $("#nav_box .error").html('<i class="form_error form_error_3 fa fa-exclamation-circle"></i><i class="form_error form_error_4 fa fa-exclamation-circle"></i>');
					else if(testOK == "02_OK") {
						$("#nav_box_menu").css("color", "#33363b");
						$("#nav_box .error").html('<i class="form_error form_error_ok form_error_1 fa fa-check"></i>');
						parent.location.href="http://<?= $_SERVER['HTTP_HOST']; ?>";
					}
					else if(testOK == "03") $("#nav_box .error").html('<i class="form_error form_error_1 fa fa-exclamation-circle"></i>');
					else if(testOK == "03_OK") {
						alert("Vos accès vous on été envoyés par mail");
						$("#nav_box .error").html('<i class="form_error form_error_ok form_error_1 fa fa-check"></i>');
					}
				});
			} else {
				$("#nav_box .error").html('');
				connector = "./.lib/connector.php?i=" + $(this).attr('id').split("_", 5)[4];
				$("#nav_box .load").load(connector, 
					function(response, status, xhr) {
						if(status == "error") {
							$("#nav_box .load").html("<div style='text-align: center; color: #fff; padding: 15px 0;'><i style='font-size: 24px;' class='fa fa-times'></i><span style='position: relative; top: -3px; font-size: 12px; padding-left: 5px;'>Erreur sur la demande. Merci de réessayer.</span></div>");
						}
					}
				);
			}
		});
	})(jQuery);
	<?php } ?>

	(function($){
		$(".notif div").show();
		$(".notif div").click(function(){
			$("."+ $(this).attr("class")).slideUp(300);
		});
	})(jQuery);

	(function($){
		$("#menu_user").click(function(){
			$("#nav_box").slideToggle(300);
		});
		$("section").click(function(){
			$("#nav_box").slideUp(300);
		});
	})(jQuery);

	(function($){
		var sections = []; var id = false; var $navbar = $('nav ul'); var $navbara = $('a', $navbar);

		$('.section').css({'height': $(window).height()+'px'});
		$(window).resize(function(){
			var hashpage = location.hash;
        			if(hashpage == "") hashpage = "#home";
			$('.section').css({'height': $(window).height()+'px'});
			$('html, body').animate({ scrollTop: $(hashpage).offset().top }, 0);
		});

		$navbara.click(function(e){
			e.preventDefault();
			$("#flux div").slideUp(300);
			$('#scroll_div').show("fade", 500);
			$('html, body').delay(450).animate({ scrollTop: $($(this).attr('href')).offset().top });

			hash($(this).attr('href'));
			$($(this).attr('href') + " .content").html("<div class='big-fa'><i class='big-fa fa fa-square-o'></i><div><span class='loader loader-double'></span></div></div>");
			var attripage = $(this).attr('href');
			var page = "./.lib/" + $(this).attr('href').replace("#", "") + ".php";
			$($(this).attr('href') + " .content").load(page, 
				function(response, status, xhr) {
					if(status == "error") {
						$(attripage + " .content").html("<div class='big-fa'><i class='big-fa fa fa-square-o'></i><div>Module indisponible</div></div>");
						$('#scroll_div').delay(500).hide("fade", 500);
					} else {
						$('#scroll_div').delay(500).hide("fade", 500);
					}
				}
			);            
		});

		$navbara.each(function(){ sections.push($($(this).attr('href'))); });

		$(window).scroll(function(e){ 
            			var scrollTop = $(this).scrollTop() + ($(window).height() / 2)
			for(var i in sections){
				var section = sections[i];
				if (scrollTop > section.offset().top) {
					scrolled_id = section.attr('id');
			    }
			 }

			if (scrolled_id !== id) {
				id = scrolled_id
				$navbara.removeClass('current');
				$('a[href="#' + id + '"]', $navbar).addClass('current');
				hash("#" + id);
			}
		});

		$(window).scroll($.debounce( 500, function(){
			if(($($(".current").attr('href')).offset().top != $(window).scrollTop())&&(Math.abs($($(".current").attr('href')).offset().top - $(window).scrollTop())) >= "8") { 
				$('html, body').animate({ scrollTop: $($(".current").attr('href')).offset().top }, "slow");
				var attripage = $(".current").attr('href');
				var page = "./.lib/" + $(".current").attr('href').replace("#", "") + ".php";
				$($(".current").attr('href') + " .content").load(page, 
					function(response, status, xhr) {
						if(status == "error") {
							$(attripage + " .content").html("<div class='big-fa'><i class='big-fa " + $('i', attripage).attr('class') + "'></i><div>Module indisponible</div></div>");
						}
					}
				);    
			 }
		}));
        
        		// Load and reload
        		var hashpage = location.hash;
        		if(hashpage == false) hashpage = "#home";
        		var page = "./.<?php if($_GET['dir'] == true) echo $_GET['dir']; else echo "lib"; ?>/" + location.hash.replace("#", "") + ".php";
        		$(hashpage + " .content").load(page, 
			function(response, status, xhr) {
				if(status == "error") {
					$(hashpage + "  .content").html("<div class='big-fa'><i class='big-fa " + $('i', hashpage).attr('class') + "'></i><div>Module indisponible</div></div>");
				}
			}
		); 

	})(jQuery);

	hash = function(h) {
		if(history.pushState) {
			history.pushState(null, null, h);
		} else {
			location.hash = h;       
		}
	}
	</script>

</body>
</html>