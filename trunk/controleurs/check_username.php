<?php

function check_username($username) { 

  $username = trim($username); //enl�ve tout espace
  $response = array(); // la r�ponse
  
  // Si le champ input .pseudo est vide
  if (!$username) {
    $response = array(
      'ok' => false, 
      'msg' => "Veuillez spécifier un nom d'utilisateur");
      
  // Verification des caract�res
  } else if (!preg_match('/^[a-z0-9.-_]+$/', $username)) {
    $response = array(
      'ok' => false, 
      'msg' => "Votre nom d'utilisateur ne peut contenir que des caractères alphanumeriques ou ces caractéres : . - _ ");
      
  // Utilise la fonction ci-dessous pour v�rifier la disponibilit�
  } else if (username_taken($username)) {
    $response = array(
      'ok' => false, 
      'msg' => "Ce nom d'utilisateur n'est pas disponible !");
      
  // Si tout est ok
  } else {
    $response = array(
      'ok' => true, 
      'msg' => "Ce nom d'utilisateur est disponible");
  }

  return $response;        
}

function username_taken($nom){
	/*require('..modeles/Membre.php');
	require('..modeles/Entreprise.php');
	
	$entreprise = Entreprise::existe($nom);
	$membre = Membre::existe($nom);
	
	return ($membre and $entreprise);*/
	require('../modeles/connect.php');
	$ok = true;
	
	$req = $bdd -> prepare('SELECT *  FROM entreprises WHERE nom_entreprise=?');
	$req -> execute(array($nom)) or $ok == false; 
	$req2 = $bdd -> prepare('SELECT *  FROM membres WHERE pseudo_membre=?');
	$req2 -> execute(array($nom)) or $ok == false;

	return (($req->rowCount() >= 1) && $ok && ($req2->rowCount() >= 1));
}	 
	 
if (@$_REQUEST['action'] == 'check_username' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo json_encode(check_username($_REQUEST['username']));
    exit; //imprime simplement une version json de la r�ponse
}
?>