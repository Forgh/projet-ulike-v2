<?php
	session_start();
	include('../include/commun.php');
	include("../modeles/Membre.php"); 

	$nb = 1;
	if (isset($_POST['pseudo'])){
		$nb = Membre::existe($_POST['pseudo']);
	}		
	$ret = true;

	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
	
	$megacondition = ($nb == 0 and empty($_POST['pseudo'])==false and empty($_POST['passwd'])==false and empty($_POST['passwdconfirm'])==false and $_POST['passwd'] == $_POST['passwdconfirm']);// and (preg_match("(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$",$_POST['passwd']));
	$megacondition = $megacondition  and empty($_POST['nom'])==false and empty($_POST['mail'])==false  and !preg_match($regex, $_POST['mail'])  and empty($_POST['prenom'])==false;
	$megacondition = $megacondition and   empty($_POST['age'])==false and empty($_POST['sexe'])==false;
	
	if ($megacondition){// on verif que l'objet est nouveau
		if ($_POST['sexe'] == "sexe_m"){
			$sexe = 'M';
		}elseif ($_POST['sexe'] == "sexe_f"){
			$sexe = 'F';
		}else{
			$sexe = 'A';
		}
		
		$Ent = new Membre($_POST['pseudo'], sha1($_POST['passwd']), $_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['age'], $sexe,0);
		$ret = $Ent->save();

		include("../modeles/mail.php");
		
		
		// GENERATION DE LA KEYCODE
		$url = $SITE_BASE . 'controleurs/validation.php?id=' . sha1($GRAINE  . "MEM" . $Ent->getPseudo());
		$msg = 'Cliquez sur le lien pour activer votre compte:  <a href="' . $url .'">' . $url .'</a><br>';	
		envoyer_mail($MAIL_ACTIVATION,$Ent->getEmail(), "Activation de votre compte", $msg );
		
		//echo "Veuillez utiliser le mail d'activation pour continuer.";
		?>
			<!DOCTYPE html>
			<html>

			<head>
				<meta charset="utf-8">
				<link rel="stylesheet" href="../css/style.css" type="text/css">
			</head>
			<body>
				
				<div id="bodycentered" >
					<h2>Etape suivante</h2>
					<p>Veuillez utiliser le mail d'activation pour continuer.</p>
				</div>
				
			</body>
			</html>
		
		<?php
	}
	

	if ($ret == false and $megacondition == false){
		//ici on trouve la raison et on modifie la page d'inscription
		
		foreach($_POST as $key=>$value){
			$_SESSION['ajout_ent.' . $key] = $value;
		} 
		header('Location : '.$SITE_BASE.'inscription.php');
	}
?>
