<?php
	session_start();
	echo 'session';
	include('../modeles/Note.php');
	echo 'note';
	include('../modeles/Like.php');
	echo 'like';

	$note = new Note($_SESSION['pseudo_membre'],$_POST['commentaire'], );
	
	$note->save();
	
	$id_auteur = $note->getId();
	
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