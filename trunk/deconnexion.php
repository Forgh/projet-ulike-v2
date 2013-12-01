<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script src="scripts/jquery.qtip.min.js"></script>
		<link rel="stylesheet" href="scripts/jquery.qtip.min.css" />
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<script>
		$(document).ready(function()
		{
			$('[title!=""]').qtip(
			{
				position: {
					my:'center left',
					at:'center right',
				},
				style : {
					classes: 'qtip-bootstrap'
				}
				
			});
			
		});
		</script>
		<script src="scripts/script_checkform.js"></script>

<title>Ulike : S'enregistrer</title>


</head>
	<body>
		<?php
			//ici on efface tous les elements de la session
			$_SESSION['login_entreprise'] = null;
			$_SESSION['pseudo_membre'] = null;
		?>
		<?php include("include/entete.php"); ?>

		<div id="bodycentered">
			<h2>Session</h2>
			<p>Vous avez été bien déconnecté.</p>
			<div class="bouton header">
				<a href="index.php"> Accueil </a>
			</div>
		</div>
		

		<?php include("include/footer.php");?>

		
		
	</body>
	
	<script type="text/javascript">
		
	
	$('#userCas').click( function() {
		$('#infoUser').slideDown( "slow", function() {
		// Animation complete.
		});
		$('#categorie').slideUp( "slow", function() {
			
		// Animation complete.
		});
		//$('#categorie').hide();
	});
	
	$('#entrepriseCas').click( function() {
		$('#infoEntreprise').slideDown( "slow", function() {
		// Animation complete.
		});
		$('#categorie').slideUp( "slow", function() {
		// Animation complete.
		});
		
		//$('#info').hide();
	});

	$('#accueil').click( function() {
		 $( "#bodycentered" ).fadeOut( "slow", function() {
			// Animation complete.
			document.location.href="accueil.php";
			//???
			$( "#bodycentered" ).fadeIn( "slow", function() {
			});
		});
		
		//$('#categorie').hide();
	});

	window.onload = function() {
		 $( "#bodycentered" ).fadeIn( "slow", function() {
			// Animation complete.
		});
	};
	</script>
</html>
