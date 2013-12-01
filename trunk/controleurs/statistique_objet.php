<?php
if(isset($_GET['objet'])){
	//$nom_objet=str_replace('_',' ',$_GET['objet']); 
	 
	$id = $_GET['objet'];
	require('modeles/Objet.php');
	require('modeles/Note.php');
	require('modeles/Like.php');
	
	$carac_objet=Objet::getObjetById($id);
	
		$nom_objet = $carac_objet->getNom();
		$categorie_objet = $carac_objet->getCategorie();
		$description_objet = $carac_objet->getDescription();
		$constructeur_objet = $carac_objet->getProprietaire();
		$img_objet = $carac_objet->getImg();
		
	$ergonomie_like=Like::getNumberOfLikesForThisCategory($nom_objet,'Ergonomie');
	$design_like=Like::getNumberOfLikesForThisCategory($nom_objet,'Design');
	$qualite_like=Like::getNumberOfLikesForThisCategory($nom_objet,'Qualité-Prix');
	
	$ergonomie_dislike=Like::getNumberOfDislikesForThisCategory($nom_objet,'Ergonomie');
	$design_dislike=Like::getNumberOfDislikesForThisCategory($nom_objet,'Design');
	$qualite_dislike=Like::getNumberOfDislikesForThisCategory($nom_objet,'Qualité-Prix');
	
	$total_ergonomie=$ergonomie_like-$ergonomie_dislike;
	$total_design = $design_like-$design_dislike;
	$total_qualite = $qualite_like-$qualite_dislike;
	
	$total_like=$design_like+$ergonomie_like+$qualite_like;
	$total_dislike=$design_dislike+$ergonomie_dislike+$qualite_dislike;
	}
else {
	echo '<p> Cet objet n\'existe pas !<p>';
}

?>
