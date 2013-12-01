<?php session_start(); ?>
<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">

		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		
			<script>
		
	$(document).ready(function()
		{
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
	});
	</script>

<title>Ulike : Se connecter</title>


</head>
	<body>
		<?php include("include/entete.php"); ?>

		<div id="bodycentered">
			<div id="categorie">
				<h2>Connexion</h2>
				<div class="msgbox">
					<p>Choisissez votre catégorie</p>
					<div class="msgbox_btn_box">
						<div class="bouton bleu" id="userCas">Utilisateur</div>
						<div class="bouton bleu" id="entrepriseCas">Entreprise</div>
					</div>
				</div>
			</div>
			
			<div id="infoUser">
				<h2>Authentification</h2>
				<div class="moitieGauche">
					<form action="controleurs/loguer_membre.php" method="post" enctype="multipart/form-data" autocomplete="on">						
						<label for="pseudonyme_membre">Pseudonyme :<span class="obligatoire">*</span></label>
						<input type="text" id="pseudonyme_membre" name="pseudo"  class="pseudo">
						
						
						<label for="passwd_membre">Mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" name="passwd" id="passwd_membre" >
						
						
						<div class="msgObligatoire">Les champs notés avec un astérique rouge sont obligatoires.</div>
						
						<input type="submit" value="valider">
					</form>
				</div>
				<div class="moitieDroite">
				<p>
					<span class="validateUsername"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
				</p>
				<p>
					<span class="validateEmail"><?php if(isset($error)) { if ($error) { echo $error['msg']; }} ?></span>
				</p>
				</div>
				
				
			</div>
			
			
			<div id="infoEntreprise">
				<h2>Informations confidentielles</h2>
				<div class="moitieGauche">
					<form action="controleurs/loguer_entreprise.php" method="post" enctype="multipart/form-data" autocomplete="on">
						<label for="pseudonyme_entreprise">Nom de l'entreprise:<span class="obligatoire">*</span></label>
						<input type="text" id="pseudonyme_entreprise" required name="pseudo" class="pseudo">

						<label for="passwd_entreprise">Mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" name="passwd" id="passwd_entreprise">
						
						<div class="msgObligatoire">Les champs notés avec un astérique rouge sont obligatoires.</div>


						<input type="submit" value="valider">
						
						
					</form>
				</div>
				
				
				
				
				
			</div>
		</div>
		

				<?php include("include/footer.php");?>

		
		
	</body>
	

</html>
