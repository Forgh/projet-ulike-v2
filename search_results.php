<?php session_start(); ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
			<link rel="stylesheet" href="css/dropbox.css" type="text/css"/>
	 
	</head>
	<body>
		<?php include("include/entete.php"); ?>
	 
		<div id="bodycentered">
			<h2>Résultats de votre recherche</h2>
			<?php require('controleurs/search.php');?>
		</div>
		
		<?php include("include/footer.php");?>
	
	</body>
</html>
		