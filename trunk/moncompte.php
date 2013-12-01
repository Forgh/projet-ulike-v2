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
	$('#modifs_btn').click( function() {
		$('#accueil').slideDown( "slow", function() {
		// Animation complete.
		});
		$('#modifs').slideUp( "slow", function() {
			
		// Animation complete.
		});
		//$('#categorie').hide();
	});
	
	$('#accueil2modif_btn').click( function() {
		$('#modifs').slideDown( "slow", function() {
		// Animation complete.
		});
		$('#accueil').slideUp( "slow", function() {
		// Animation complete.
		});
		 
		//$('#info').hide();
	});

	$('#ajout_objet').click( function() {
		$( "#bodycentered" ).fadeOut( "slow", function() {
			// Animation complete.
		});
		//$('#info').hide();
		document.location.href="ajout_objet.php";
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
			
			<?php if (isset($_SESSION['pseudo_membre'])){
			?>
			<div id="accueil">
				<h2>Mon compte - <?php echo $_SESSION['pseudo_membre']; ?></h2>
				<p>Dans cet espace membre vous pouvez modifier vos informations personnelles.</p>
				<div class="bouton bleu" id="accueil2modif_btn">Modifier</div>
			</div>
			<div id="modifs">
				<h2>Mon compte - <?php echo $_SESSION['pseudo_membre']; ?></h2>
				<div class="moitieGauche">
					<div class="bouton bleu" id="modifs_btn">Retour</div>
					<form action="controleurs/modifier_membre.php" method="post" enctype="multipart/form-data" autocomplete="on">						
						
						
						<label for="passwd">Mot de passe :</label>
						<input type="password" title="Votre mot de passe doit comporter au moins : <br>- 1 majuscule,<br>- 1 minuscule, <br>- 1 chiffre"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="passwd" id="passwd" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Votre mot de passe doit comporter au moins 1 majuscule, 1 minuscule et un chiffre' : ''); if(this.checkValidity()) form.passwordconfirm.pattern = this.value; ">
						<label for="passwdconfirm">Confirmez le mot de passe :</label>
						<input type="password" title="Doit être identique à celui ci-dessus"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Veuillez entrer un mot de passe identique à celui ci-dessus' : ''); " name="passwdconfirm" class="passwdconfirm">

						<label for="mail">Email :</label>
						<input type="email" title="Doit être de la forme :<br>nom@domain.zone" name="mail" class="email"<?php if (isset($_SESSION['ajout_membre.mail']))
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
			<?php } elseif (isset($_SESSION['login_entreprise'])){
			?>
			<div id="accueil">
				<h2>Mon compte - <?php echo $_SESSION['login_entreprise']; ?></h2>
				<p>Dans cet espace privée vous pouvez modifier vos informations concernant votre entreprise.</p>
				<div class="bouton bleu" id="accueil2modif_btn">Modifier</div>
				<p>Ajouter un objet:</p>
				<div class="bouton bleu" id="ajout_objet">Ajouter objet</div>
			</div>
			<div id="modifs">
				<h2>Mon compte - <?php echo $_SESSION['login_entreprise']; ?></h2>
				
				<div class="moitieGauche">
					<div class="bouton bleu" id="modifs_btn">Retour</div>
					<form action="controleurs/modfifier_entreprise.php" method="post" enctype="multipart/form-data" autocomplete="on">
						
						<label for="passwd">Mot de passe :</label>
						<input type="password" title="Votre mot de passe doit comporter au moins : <br>- 1 majuscule,<br>- 1 minuscule, <br>- 1 chiffre"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="passwd" id="passwd" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Votre mot de passe doit comporter au moins 1 majuscule, 1 minuscule et un chiffre' : ''); if(this.checkValidity()) form.passwordconfirm.pattern = this.value; ">
						<label for="passwdconfirm">Confirmez le mot de passe :</label>
						<input type="password" title="Doit être identique à celui ci-dessus"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" onchange=" this.setCustomValidity(this.validity.patternMismatch ? 'Veuillez entrer un mot de passe identique à celui ci-dessus' : ''); " name="passwdconfirm" class="passwdconfirm">

						<label for="mail">Email :</label>
						<input type="email" title="Doit être de la forme :<br>nom@domain.zone" name="mail_ent" class="email" <?php if (isset($_SESSION['ajout_ent.mail_ent']))
																echo ' value="' . $_SESSION['ajout_ent.mail_ent'] .'"'; ?>>
						
						<label for="siren">N° SIREN:</label>
						<input type="text" title="Sert à identifier votre entreprise<br>Cette information ne sera jamais publié"  name="siren" id="siren"<?php if (isset($_SESSION['ajout_ent.siren']))
																echo ' value="' . $_SESSION['ajout_ent.siren'] .'"'; ?>>

						<label for="nom_gerant">Nom du gérant</label>
						<input type="text" title="Sert à identifier votre entreprise<br>Cette information ne sera jamais publié"  name="nom_gerant" id="nom_gerant"<?php if (isset($_SESSION['ajout_ent.nom_gerant']))
																echo ' value="' . $_SESSION['ajout_ent.nom_gerant'] .'"'; ?>>


						<label for="adr_ent">Adresse:</label>
						<input type="text"  name="adr_ent" id="adr_ent"<?php if (isset($_SESSION['ajout_ent.adr_ent']))
																echo ' value="' . $_SESSION['ajout_ent.adr_ent'] .'"'; ?>>

						<label for="code_ent">Code postal:</label>
						<input type="text"  name="code_ent" id="code_ent"<?php if (isset($_SESSION['ajout_ent.code_ent']))
																echo ' value="' . $_SESSION['ajout_ent.code_ent'] .'"'; ?>>

						<label for="pays_ent">Pays:</label>
						<input type="text"  name="pays_ent" id="pays_ent"<?php if (isset($_SESSION['ajout_ent.pays_ent']))
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
			<?php } else{
			?>
				<h2>Problème d'authentification</h2>
				<p>Vous n'êtes pas logué !</p>
			<?php }
			?>
		</div>
		

				<?php include("include/footer.php");?>

		
		
	</body>
	
	
</html>
