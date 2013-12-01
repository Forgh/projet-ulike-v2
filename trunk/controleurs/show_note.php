<?php
	$id=$_GET['objet'];
	 
	require('modeles/Objet.php');
	require('modeles/Note.php');
	require('modeles/Like.php');

	$carac_objet=Objet::getObjetById($id);

		echo 'lol';
		$nom_objet = $carac_objet->getNom();
	
		$notes = Note::fetchNotesByObjet($nom_objet);
		
		foreach($notes as $value){
			$likes = Like::getLikesByOrigin($value['id_note']);
			$dislikes = Like::getDislikesByOrigin($value['id_note']);
		?>	
		<div class="bodycentered_line"></div>
	
		<div class="liste_objet_pair">	
						
			 		<div class="liste_objet_info">
							
						<p><span class="presentationObjetLbl"><?php echo $value['pseudo_auteur']; ?></span></p>
						<p><span class="presentationObjetLbl">J'aime :
							</span><?php foreach($likes as $contenu_likes) {
											echo $contenu_likes['contenu_like']+", ";
							} ?></p>
						<p><span class="presentationObjetLbl">Je n'aime pas :
							</span><?php foreach($dislikes as $contenu_dislikes) {
											echo $contenu_dislikes['contenu_like']+", ";
							} ?></p>
						<p><span class="presentationObjetLbl">Commentaire:</span><?php echo $value['commentaire']; ?></p>
								
					</div>
						
				</div>
			
		<?php
		}
		

?>