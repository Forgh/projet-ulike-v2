<?php
 
	$id = $_GET['objet'];
	include('modeles/Objet.php');
	include('modeles/Note.php');
	include('modeles/Like.php');
	
	$carac_objet=Objet::getObjetById($id);
	
		$nom_objet = $carac_objet->getNom();
		$categorie_objet = $carac_objet->getCategorie();
		$description_objet = $carac_objet->getDescription();
		$constructeur_objet = $carac_objet->getProprietaire();
		$img_objet = $carac_objet->getImg();
		
	$ergonomie_like=Like::getLikesForCategory($nom_objet,'Ergonomie');
	echo 'ergo :'.$ergonomie_like;
	$design_like=Like::getLikesForCategory($nom_objet,'Design');
	echo 'design:'.$design_like;
	$qualite_like=Like::getLikesForCategory($nom_objet,'Qualité-Prix');
	echo 'qualite:'.$qualite_like;
	$ergonomie_dislike=Like::getDislikesForCategory($nom_objet,'Ergonomie');
		echo 'ergo :'.$ergonomie_dislike;

	$design_dislike=Like::getDislikesForCategory($nom_objet,'Design');
		echo 'design:'.$design_dislike;

	$qualite_dislike=Like::getDislikesForCategory($nom_objet,'Qualité-Prix');
		echo 'qualite:'.$qualite_dislike;

	$total_ergonomie=$ergonomie_like-$ergonomie_dislike;
	$total_design = $design_like-$design_dislike;
	$total_qualite = $qualite_like-$qualite_dislike;
	
	$total_like=$design_like+$ergonomie_like+$qualite_like;
	$total_dislike=$design_dislike+$ergonomie_dislike+$qualite_dislike;

?>
