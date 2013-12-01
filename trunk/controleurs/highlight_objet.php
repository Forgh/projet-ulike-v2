<?php 

	require_once('modeles/Objet.php');
	require_once('modeles/Like.php'); 
		
	$carac_objet=Objet::getLastInsertedObjet();
	//Recupération des données
	$nom_objet = $carac_objet->getNom();
	$categorie_objet = $carac_objet->getCategorie();
	$description_objet = $carac_objet->getDescription();
	$constructeur_objet = $carac_objet->getProprietaire();
	$img_objet = $carac_objet->getImg();
	//Récupération de TOUS les likes/dislikes
	$number_likes= Like::getNumberOfLikes($nom_objet);
	$number_dislikes = Like::getNumberOfDislikes($nom_objet);
	
?>

