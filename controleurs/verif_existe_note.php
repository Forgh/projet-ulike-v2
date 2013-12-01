<?php

	$pseudo = $_SESSION['pseudo_membre'];
	
	$condition = Note::existeNotesByObjetAndPseudo($nom_objet,$pseudo);
	
	if($condition) {
		echo '<div class="msgbox_btn_box">
						<a href="soumissionnote.php"><div class="bouton bleu" id="userCas">Ajouter une note</div></a>
					</div>';
	}
?>