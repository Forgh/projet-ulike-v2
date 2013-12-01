<?php
	session_start();
	echo 'session';
	include('../modeles/Note.php');
		echo 'note';

	include('../modeles/Like.php');
	echo 'like';

	$nom_objet= $_POST['nom_objet'];
		echo 'nomobjet';

	$note = new Note($_SESSION['pseudo_membre'],$_POST['commentaire'],$nom_objet);
		echo 'newnote';

	$note->save();
		echo 'save';

	$id_auteur = Note::getId();
		echo 'getid';

	foreach($_POST['likes'] as $key=>$value){
		$like = new Like($value, $id_auteur, 1);
		$like->save();
	}
		echo 'likes';

	foreach($_POST['dislikes'] as $key=>$value){
		$dislike = new Like($value, $id_auteur, 0);
		$dislike->save();
	}
		echo 'dislikes';

	header( 'Location : http://projets-lightdark.fr/ulike/post_ajout_userinput.php');

?>