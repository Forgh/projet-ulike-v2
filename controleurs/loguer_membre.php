<?php
	session_start();
	
	include("../modeles/Membre.php");
	include('../include/commun.php');
		
		
	if(isset($_POST['pseudo'])){
		$Ent = Membre::getMembreParPseudo($_POST['pseudo']);

		
		if($Ent !=null){ //existe
			$shaOne = sha1($_POST['passwd']);
			//echo $_POST['passwd_ent'], "?<br>", $shaOne, "<br>", $Ent->getPasswd();
			if (strnatcmp($shaOne,$Ent->getPasswd()) == 0 and $Ent->isEmailConfirmed() == true){
				$_SESSION['pseudo_membre'] = $_POST['pseudo'];
				//ok
				//echo "ok, vous êtes bien logué";
				header("Location: ". $SITE_BASE . "post_ajout_userinput.php");
			}elseif ($Ent->isEmailConfirmed() == false){ 
				//activation
				//echo "Vous devez d'abord activez votre compte. Un mail vient de vous être envoyé.";
				
				/* MAIL */
				include("../modeles/mail.php");
				mail_activation_membre( $Ent );
				
				$_SESSION['login_err']  = "Erreur d'activation";
				$_SESSION['login_err_msg'] = "Vous devez d'abord activez votre compte. Un mail vient de vous être envoyé.";
				
				header("Location: ". $SITE_BASE . "erreur_login.php");
				
			}else{
				//Mdp incorrect
				//echo "Désolé mais le login ou le mot de passe est incorrect.";
				$_SESSION['login_err']  = "Erreur de connexion";
				$_SESSION['login_err_msg'] = "Désolé mais le login ou le mot de passe est incorrect.";
				
				header("Location: ". $SITE_BASE . "erreur_login.php");
			}
		}else{
			//login incorrect
			//echo "Désolé mais le login ou le mot de passe est incorrect.²";
			$_SESSION['login_err']  = "Erreur de connexion";
			$_SESSION['login_err_msg'] = "Désolé mais le login ou le mot de passe est incorrect.";
			
			header("Location: ". $SITE_BASE . "erreur_login.php");
		}
	}else{
		//login manquant
		//echo "Veuillez rentrer un pseudo.";
		$_SESSION['login_err']  = "Erreur de connexion";
		$_SESSION['login_err_msg'] = "Veuillez entrer un login.";
		
		header("Location: ". $SITE_BASE . "erreur_login.php");
	}

	
	
?>
