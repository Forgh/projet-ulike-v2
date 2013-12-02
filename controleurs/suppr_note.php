<?php
	include('modeles/Note.php');
	foreach($_POST['notes'] as $values){
		$suppr=Note::deleteById($values,$_SESSION['pseudo_membre'];
	}
?>