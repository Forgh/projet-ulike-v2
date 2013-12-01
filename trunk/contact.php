<!DOCTYPE html>
<html> 
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style-ulike.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="scripts/jquery.qtip.min.js"></script>
		<link rel="stylesheet" href="scripts/jquery.qtip.min.css" />

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
		<title> ULike </title>
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >
		<form  action="controleurs/post_contact.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Nous contacter : </legend>
					<div id="fieldcontact">
						
						<div id="fieldnom"> 
							<p>
								<label class="sujet" for="sujet"> Nom : </label>
							</p>
							<input type="text" title="Votre nom ne sera jamais communiqu�" class="sujet" name="sujet" />
						</div>
						
						<div id="fieldmail">
							<p>
								<label for="mail"> Adresse Mail : </label>
							</p>
							<input type="email" id="mail" name="mail" title="Nous ne demandons votre adresse que dans l'intention de vous recontacter" placeholder ="jean.dupont@votremail.com" />
						</div>

					</div>
					
					<p>
						<label for="contenu"> Sujet : </label>
					</p>
					<textarea name="texte" id="contenu" placeholder ="Une question ? Un avis ? Ecrivez ici vos remarques !" ></textarea>
					
					<p>
					<input type="submit" value="Envoyer"/>
					</p>
				
		</form>
		</div>	
		 
		<?php include("include/footer.php");?>
				
	</body>
</html>

