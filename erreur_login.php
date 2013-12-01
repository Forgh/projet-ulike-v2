<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="5;url=<?php echo $SITE_BASE ?>login.php" >
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	
	<div id="bodycentered" >
		<?php
			if(isset($_POST['login_err'])){
		?>
		<h2><?php echo $_POST['login_err']; ?></h2>
		<p><?php echo $_POST['login_err_msg']; ?></p>
		<?php
			}else{
		?>
		<h2>Aucune erreur</h2>
		<p>Aucune erreur détecté.</p>
		<?php } 
			$_POST['login_err'] = null;
		?>
	</div>
	
</body>
</html>

