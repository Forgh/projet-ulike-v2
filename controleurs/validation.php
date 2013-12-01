<?php session_start(); ?>
<DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	
	<div id="bodycentered" >
		<h2>Validation d'un compte</h2>
		<?php 
			if (!isset($_GET["id"])){
				//PAGE erreur
				//die("Erreur lien incohérent");
				echo "<p>Erreur lien incohérent</p>";
			}else{
			$param = $_GET["id"];
		?>

		<form  class="formulaire" method="POST" enctype="multipart/form-data" <?php echo 'action="../controleurs/activation_mail.php?id=' . $param.'"'; ?>  >
			<p>
				<label for="login_validation">Pseudo ou nom du gérant:</label>
				<input type="text" name="login_validation" >
			</p>
			
			<input type="submit" value="Activer le compte">
		</form>
		
		<?php } ?>
	</div>
	
</body>
</html>
