<?php
	require('modeles/Note.php');
	require('modeles/Objet.php');
	
	$pseudo = $_SESSION['pseudo_membre'];
	$id = $_GET['objet'];
	$objet =Objet::getObjetById($id);
	$nom = $objet->getNom();
	
	$condition = Note::existeNotesByObjetAndPseudo($nom,$pseudo);
	
	if(!$condition) {
		echo '<div class="msgbox_btn_box">
						<a href="soumissionnote.php"><div class="bouton bleu" id="userCas">Ajouter une note</div></a>
					</div>';
	}
?>