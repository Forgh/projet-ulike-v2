<?php
include("../modeles/mail.php");

$to=htmlspecialchars('none@none.fr');
$sujet='Contact ULike : M/Mme '.$_POST['sujet'];
$corps='Une nouvelle question vous a été posé : '.$_POST['texte'];
/*$headers = 'From: ' . $_POST['mail']. '\r\n' .
'Reply-To: prenom.nom@univ-montp2.fr' . '\r\n' .
'X-Mailer: PHP/' . phpversion();
mail($to,$sujet,$corps,$headers);*/
$mail = $_POST['mail'];
envoyer_mail($mail,$to, $sujet, $corps );
?>