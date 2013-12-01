<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<link rel="stylesheet" href="css/dropbox.css" type="text/css"/>
<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script src="scripts/jquery.qtip.min.js"></script>
		<link rel="stylesheet" href="scripts/jquery.qtip.min.css" />
		<script src="scripts/script_checkobjet.js"></script>
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
</head>
<body>
		<?php include("include/entete.php"); ?>

<div id="bodycentered">
<h2>Formulaire d'ajout d'objet</h2>


 <?php
	if (!isset($_SESSION['login_entreprise'])){
		echo "Désolé, cette parti n'est réservé qu'aux entreprise enregistrées.";
	}
	else {
 ?>
		<form method="POST" enctype="multipart/form-data" id="cibleFormAjout" action="post_input_objet.php"  >
		 	<div id="ajoutobjet">
	
			<p>	
				<label for="nom_objet">Nom de votre objet :</label>	
			</p>
			<p>	
				<input id="nom_objet" type="text"  name="nom_objet">
			</p>
			
			<p>
				<label for="categorie_objet">Catégorie :</label>
			</p>
			<p>	
				<select id="categorie_objet" name="categorie_objet" >
					<?php 
						require_once('controleurs/categories.php');
					?>
				</select>
			</p>
			<p>
				<label for="description">Description:</label>
			</p>
			<p>	
				<textarea  id="description" name="description" placeholder="Décrivez votre objet ici"></textarea>
				
			</p> 
		</div> 
		
			<p>
				<div id="dropbox">
		    			<span class="message"> Veuillez glisser-déposer ici l'image de votre objet...</span>
        		</div>
        	</p>
			<p>
				<div class="msgObligatoire">Tout les champs sont obligatoires.</div>
			</p>
			<p>
				<input type="submit" value="Ajouter" >
			</p>
		</form>
		
	
		<?php 
	}
	?>	
</div>
		<?php include("include/footer.php");?>

		<!-- Inclure JQuery -->
        <script src="scripts/jquery.js"></script>

        <!-- Inclure le plugin HTML5 Uploader -->
        <script src="scripts/jquery.filedrop.js"></script>
              <!-- Le script principal de la dropbox -->
		<script src="scripts/script_dropbox.js"></script>
	
</body>
</html>