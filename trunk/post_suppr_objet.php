<?php session_start(); ?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" >
		<title> ULike </title>
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<?php include("controleurs/suppr_objet.php"); ?>
		<div id="bodycentered" >
			<h2>Opération réussie.</h2>
			<p>Votre objet a bien été supprimé.</p>
		</div>
				<?php include("include/footer.php"); ?>

	</body>
</html>