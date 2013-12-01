<?php
include('../modeles/mail.php');
$to=htmlspecialchars('bob@yopmail.com');
$sujet='Contact ULike : M/Mme '.$_POST['sujet'];
$corps='Une nouvelle question vous a été posé : '.$_POST['texte'];

envoyer_mail($to,$_POST['mail'],$sujet,$corps);
?>