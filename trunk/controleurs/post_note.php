<?php
	session_start();
	include('../modeles/Note.php');
	include('../modeles/Like.php');

	$nom_objet= $_POST['nom_objet'];
	$note = new Note($_SESSION['pseudo_membre'],$_POST['commentaire'],$nom_objet);
	
	$note->save();
	
	$id_auteur = Note::getId();
	
	foreach($_POST['likes'] as $key=>$value){
		$like = new Like($value, $id_auteur, 1);
		$like->save();
	}
	
	foreach($_POST['dislikes'] as $key=>$value){
		$dislike = new Like($value, $id_auteur, 0);
		$dislike->save();
	}
	
	header( 'Location : http://projets-lightdark.fr/ulike/post_ajout_userinput.php');

?>