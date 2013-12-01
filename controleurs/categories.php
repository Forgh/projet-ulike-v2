<?php
	require_once('modeles/Objet.php');
	 
	$categories = Objet::seekAllCategories();
	
    foreach($categories as $une_categorie)  
	{
		echo '<option value="'.$une_categorie['nom_categorie'].'">'.$une_categorie['nom_categorie'].'</option>';
	}
	
?>