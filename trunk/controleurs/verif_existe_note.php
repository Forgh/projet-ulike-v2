<?php

	$pseudo = $_SESSION['pseudo_membre'];
	
	$condition = Note::existeNotesByObjetAndPseudo($nom_objet,$pseudo);
	
	if($condition) {?>
	<div class="msgbox_btn_box">
				<form  action="soumissionnote.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="nom_objet" value="<?php echo $nom_objet; ?>" >
						<input type="submit" value="Ajouter votre Like">
				</form>
	</div>
	<?php
	}
?>