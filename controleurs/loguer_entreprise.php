<?php
	session_start();

	include("../include/commun.php");
	include("../modeles/Entreprise.php");
		
	
	// pour l'affichage des types d'erreurs voir révision 35
	if(isset($_POST['pseudo'])){
		$Ent = Entreprise::getEntrepriseParNom($_POST['pseudo']);
		
		if($Ent !=null ){ //existe
			$shaOne = sha1($_POST['passwd']);
			//echo $_POST['passwd_ent'], "?<br>", $shaOne, "<br>", $Ent->getPasswd();
			if (strnatcmp($shaOne,$Ent->getPasswd()) == 0 and $Ent->isEmailConfirmed() == true){
				$_SESSION['login_entreprise'] = $_POST['pseudo'];
				//ok
				//echo "ok, vous êtes bien logué";
				/* MAIL */
				include("../modeles/mail.php");
				mail_activation_membre( $Ent );
				
				header("Location: ". $SITE_BASE . "erreur_login.php");
				
			}else{
				//Mdp incorrect
				
				header("Location: ". $SITE_BASE . "erreur_login.php");
			}
		}else{
			//login incorrect
			
			header("Location: ". $SITE_BASE . "erreur_login.php");
		}
	}else{
		//login manquant
		
		header("Location: ". $SITE_BASE . "erreur_login.php");
	}
	
	
?>
