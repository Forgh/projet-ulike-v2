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
		<script src="scripts/script_checkform.js"></script>

<title>Ulike : S'enregistrer</title>


</head>
	<body>
		<?php include("include/entete.php"); ?>

		<div id="bodycentered">
			<div id="categorie">
				<h2>Inscription</h2>
				<div class="msgbox">
					<p>Choisissez votre catégorie</p>
					<div class="msgbox_btn_box">
						<div class="bouton bleu" id="userCas">Utilisateur</div>
						<div class="bouton bleu" id="entrepriseCas">Entreprise</div>
					</div>
				</div>
			</div>
			
			<div id="infoUser">
				<h2>Informations personnelles</h2>
				<div class="moitieGauche">
					<form action="controleurs/inscrire_membre.php" method="post" enctype="multipart/form-data" autocomplete="on">						
						<label for="pseudo_membre">Pseudonyme :<span class="obligatoire">*</span></label>
						<input type="text" id="pseudo_membre" name="pseudo" title="Sera affiché sur vos commentaires. <br> Retenez-le, il servira à vous authentifier" class="pseudo"<?php if (isset($_SESSION['ajout_membre.pseudo']))
																echo ' value="' . $_SESSION['ajout_membre.pseudo'] .'"'; ?>>
						
						
						<label for="passwd_membre">Mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" title="Votre mot de passe doit comporter au moins : <br>- 1 majuscule,<br>- 1 minuscule, <br>- 1 chiffre" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="passwd" id="passwd_membre" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Votre mot de passe doit comporter au moins 1 majuscule, 1 minuscule et un chiffre' : ''); if(this.checkValidity()) form.passwordconfirm.pattern = this.value; ">
						<label for="passwdconfirm_membre">Confirmez le mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" id="passwdconfirm_membre" title="Doit être identique à celui ci-dessus" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Veuillez entrer un mot de passe identique à celui ci-dessus' : ''); " name="passwdconfirm" class="passwdconfirm">

						<label for="mail_membre">Email :<span class="obligatoire">*</span></label>
						<input type="email" id="mail_membre" title="Doit être de la forme :<br>nom@domain.zone" name="mail" class="email"<?php if (isset($_SESSION['ajout_membre.mail']))
																echo ' value="' . $_SESSION['ajout_membre.mail'] .'"'; ?>>
						
						<label for="nom">Nom :</label>
						<input type="text" title="Votre nom ne sera jamais publié<br>ni transmis" name="nom" id="nom"<?php if (isset($_SESSION['ajout_membre.nom']))
																echo ' value="' . $_SESSION['ajout_membre.nom'] .'"'; ?>>
						
						<label for="prenom">Prénom :</label>
						<input type="text" title="Votre prénom ne sera jamais publié<br>ni transmis" name="prenom" id="prenom"<?php if (isset($_SESSION['ajout_membre.prenom']))
																echo ' value="' . $_SESSION['ajout_membre.prenom'] .'"'; ?>>

						
						<label for="age">Date de naissance :</label>
						<input type="text"  title="Votre âge ne sera utilisé<br>qu'à des fin statistiques" name="age" id="age"<?php if (isset($_SESSION['ajout_membre.dateN']))
																echo ' value="' . $_SESSION['ajout_membre.dateN'] .'"'; ?>>
						
						<label>Sexe:</label>
						<SELECT  title="Cette information ne sera utilisé<br>qu'à des fin statistiques" id="sexe" name="sexe">
							<?php 
								$categorie = array('M', 'F', 'Autre');
								$categorie_name = array('sexe_m', 'sexe_f', 'sexe_autre');
								
									for($i = 0; $i<count($categorie);$i++){
										if (isset($_SESSION['ajout_membre.sexe']) and $_SESSION['ajout_membre.sexe'] == $categorie_name[i]){
											echo '<option value="' . $categorie_name[$i] . '" selected >' . $categorie[$i] . '</OPTION>';
										}else{
											echo '<option value="' . $categorie_name[$i] . '">' . $categorie[$i] . '</OPTION>';
										}
									}
							?>
						</SELECT>
						
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
					<form action="controleurs/inscrire_entreprise.php" method="post" enctype="multipart/form-data" autocomplete="on">
						<label for="pseudo_entreprise">Nom de l'entreprise:<span class="obligatoire">*</span></label>
						<input type="text" id="pseudo_entreprise" title="Sera affiché sur la description de vos objets <br> Retenez-le, il servira à vous authentifier" required name="pseudo" class="pseudo"<?php if (isset($_SESSION['ajout_ent.nom_ent']))
																echo ' value="' . $_SESSION['ajout_ent.nom_ent'] .'"'; ?>>

						<label for="passwd_entreprise">Mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" title="Votre mot de passe doit comporter au moins : <br>- 1 majuscule,<br>- 1 minuscule, <br>- 1 chiffre" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="passwd" id="passwd_entreprise" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Votre mot de passe doit comporter au moins 1 majuscule, 1 minuscule et un chiffre' : ''); if(this.checkValidity()) form.passwordconfirm.pattern = this.value; ">
						<label for="passwdconfirm_entreprise">Confirmez le mot de passe :<span class="obligatoire">*</span></label>
						<input type="password" id="passwdconfirm_entreprise" title="Doit être identique à celui ci-dessus" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Veuillez entrer un mot de passe identique à celui ci-dessus' : ''); " name="passwdconfirm" class="passwdconfirm">

						<label for="mail_entreprise">Email :<span class="obligatoire">*</span></label>
						<input type="email" id="mail_entreprise" title="Doit être de la forme :<br>nom@domain.zone" name="mail_ent" class="email" <?php if (isset($_SESSION['ajout_ent.mail_ent']))
																echo ' value="' . $_SESSION['ajout_ent.mail_ent'] .'"'; ?>>
						
						<label for="siren">N° SIREN:<span class="obligatoire">*</span></label>
						<input type="text" title="Sert à identifier votre entreprise<br>Cette information ne sera jamais publié" required name="siren" id="siren"<?php if (isset($_SESSION['ajout_ent.siren']))
																echo ' value="' . $_SESSION['ajout_ent.siren'] .'"'; ?>>

						<label for="nom_gerant">Nom du gérant<span class="obligatoire">*</span></label>
						<input type="text" title="Sert à identifier votre entreprise<br>Cette information ne sera jamais publié" required name="nom_gerant" id="nom_gerant"<?php if (isset($_SESSION['ajout_ent.nom_gerant']))
																echo ' value="' . $_SESSION['ajout_ent.nom_gerant'] .'"'; ?>>


						<label for="adr_ent">Adresse:<span class="obligatoire">*</span></label>
						<input type="text" required name="adr_ent" id="adr_ent"<?php if (isset($_SESSION['ajout_ent.adr_ent']))
																echo ' value="' . $_SESSION['ajout_ent.adr_ent'] .'"'; ?>>

						<label for="code_ent">Code postal:<span class="obligatoire">*</span></label>
						<input type="text" required name="code_ent" id="code_ent"<?php if (isset($_SESSION['ajout_ent.code_ent']))
																echo ' value="' . $_SESSION['ajout_ent.code_ent'] .'"'; ?>>

						<label for="pays_ent">Pays:<span class="obligatoire">*</span></label>
						<input type="text" required name="pays_ent" id="pays_ent"<?php if (isset($_SESSION['ajout_ent.pays_ent']))
																echo ' value="' . $_SESSION['ajout_ent.pays_ent'] .'"'; ?>>
						
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
		</div>
		

				<?php include("include/footer.php");?>

		
		
	</body>
	
	
</html>
