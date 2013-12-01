<?php

function check_email($email) {

  $email = trim($email); // supprime les espaces
  $response = array(); // R�ponse
  $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

  // Si le champ inpout #pseudo est vide
  if (!$email) {
    $response = array(
      'ok' => false, 
      'msg' => "Indiquez une adresse mail svp");
      
  // Verification des caract�res
  } else if (!preg_match($regex, $email)) {
    $response = array(
      'ok' => false, 
      'msg' => "Votre adresse est invalide");
      
  // Utilise la fonction ci-dessous pour v�rifier la disponibilit�
  } else if (email_taken($email)) {
    $response = array(
      'ok' => false, 
      'msg' => "Cette adresse e-mail a déjà été utilisé !");
      
  // Si tout est ok
  } else {
    $response = array(
      'ok' => true, 
      'msg' => "Cette adresse est disponible");
  }

  return $response;         
}

function email_taken($email){
 	require('../modeles/connect.php');
	$ok = true;
	
	$req = $bdd -> prepare('SELECT *  FROM entreprises WHERE email_entreprise=?');
	$req -> execute(array($email)); 
	$req2 = $bdd -> prepare('SELECT *  FROM membres WHERE email_membre=?');
	$req2 -> execute(array($email));

	return (($req->rowCount() >= 1) || ($req2->rowCount() >= 1));
}	

if (@$_REQUEST['action'] == 'check_email' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo json_encode(check_email($_REQUEST['email']));
    exit; // print uniquement la version json de la r�ponse
}
?>