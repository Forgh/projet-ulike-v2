<?php
 
function check_objet($objet) {

  $objet = trim($objet); //enl�ve tout espace
  $response = array(); // la r�ponse
  
  // Si le champ input .pseudo est vide
  if (!$objet) {
    $response = array(
      'ok' => false, 
      'msg' => "Veuillez spécifier un nom d'objet");
      
  // Verification des caract�res
  } else if (!preg_match('/^[a-z0-9.-_]+$/', $objet)) {
    $response = array(
      'ok' => false, 
      'msg' => "Le nom d'objet ne peut contenir que des caractères alphanumeriques ou ces caractéres : . - _ ");
      
  // Utilise la fonction ci-dessous pour v�rifier la disponibilit�
  } else if (objet_taken($objet)) {
    $response = array(
      'ok' => false, 
      'msg' => "Ce nom d'objet n'est pas disponible !");
      
  // Si tout est ok
  } else {
    $response = array(
      'ok' => true, 
      'msg' => "Ce nom d'objet est disponible");
  }

  return $response;        
}

function objet_taken($nom){
	require('../modeles/connect.php');
	$ok = true;
	
	$req = $bdd -> prepare('SELECT *  FROM objets WHERE nom_objet=?');
	$req -> execute(array($nom)) or $ok == false; 
	return (($req->rowCount() >= 1) && $ok);
}	 
	  
if (@$_REQUEST['action'] == 'check_objet' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo json_encode(check_objet($_REQUEST['objet']));
    exit; //imprime simplement une version json de la r�ponse
}
?>