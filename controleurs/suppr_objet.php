<?php
	include('modeles/Objet.php');
	foreach($_POST['objets'] as $values){
		$suppr=Objet::deleteById($values,$_SESSION['login_entreprise'];
	}
?>