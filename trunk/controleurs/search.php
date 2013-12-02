<?php 
 $search = $_GET['search'];
 require_once('modeles/Objet.php');
 
 $results=Objet::getLikeObjet($search);
	if(count($results)> 0){
		 foreach($results as $carac_objet) {

		 ?>	
		 
		 <div class="liste_objet_pair">	
					
				<a href="presentation.php?objet=<?php echo $carac_objet['id_objet']; ?>"><img class="liste_objet_picture" src="<?php echo $carac_objet['img_objet']; ?>"  width="64" height="64" alt=""/></a>
					
		 		<div class="liste_objet_info">
						
					<p><span class="presentationObjetLbl">Nom:</span><span class="presentationObjetNom"><?php echo $carac_objet['nom_proprietaire']; ?> - <?php echo $carac_objet['nom_objet']; ?></span></p>
					<p><span class="presentationObjetLbl">Categorie:</span><?php echo $carac_objet['categorie_objet']; ?></p>
					<p><span class="presentationObjetLbl">Description:</span><?php echo $carac_objet['description_objet']; ?></p>
							
				</div>
					
			</div>
		
				<div class="bodycentered_line"></div>
				<?php
		 }
	}
	else{
		?><p>Désolé, aucun objet ne correponds à votre recherche !</p><?php
	}

?>