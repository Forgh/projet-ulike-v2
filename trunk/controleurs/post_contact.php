<?php
include('../modeles/mail.php');
$to=htmlspecialchars('bob@yopmail.com');
$sujet='Contact ULike : M/Mme '.$_POST['nom'];
$corps='Une nouvelle question vous a été posé : '.$_POST['texte'];
$headers = 'From: ' . $_POST['mail']. '\r\n' .
'Reply-To: prenom.nom@univ-montp2.fr' . '\r\n' .
'X-Mailer: PHP/' . phpversion();
mail($to,$sujet,$corps,$headers);
?>