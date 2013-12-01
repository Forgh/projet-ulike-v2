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
		<?php include("controleurs/post_note.php"); ?>
		<div id="bodycentered" >
			<h2>Opération réussie.</h2>
			<p>Votre Like/Dislike a bien été ajouté.</p>
		</div>
				<?php include("include/footer.php"); ?>

	</body>
</html>