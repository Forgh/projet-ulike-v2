<?php
	session_start();
	
	 
	include('../include/commun.php');
	include("../modeles/Entreprise.php");

	if (isset($_SESSION['login_entreprise'])){
		$Ent = Entreprise::getEntrepriseParNom($_SESSION['login_entreprise']);
		//$megacondition = ($nb == 0 and empty($_POST['pseudo'])==false  and empty($_POST['passwd'])==false and empty($_POST['passwdconfirm'])==false and $_POST['passwd'] == $_POST['passwdconfirm'] and empty($_POST['nom_gerant'])==false and empty($_POST['mail_ent'])==false and !preg_match($regex, $_POST['mail_ent']) and empty($_POST['adr_ent'])==false and empty($_POST['code_ent'])==false and empty($_POST['pays_ent'])==false);// and (preg_match("(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$",$_POST['passwd_ent'] ));
	
		if ($Ent != null){
			if (!empty($_POST['passwd']) and empty($_POST['passwdconfirm'])==false and $_POST['passwd'] == $_POST['passwdconfirm'] ){
				$Ent->setPasswd(sha1($_POST['passwd']));
			}
			
			if (!empty($_POST['nom_gerant'])){
				$Ent->setNomGerant($_POST['nom_gerant']);
			}
			
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
			if (!empty($_POST['mail_ent']) and !preg_match($regex, $_POST['mail_ent']) ){
				$Ent->setEmail($_POST['mail_ent']);
			}
			
			
			if (!empty($_POST['adr_ent'])){
				$Ent->setAdresse($_POST['adr_ent']);
			}
			
			if (!empty($_POST['code_ent'])){
				$Ent->setCode($_POST['code_ent']);
			}
			
			if (!empty($_POST['siren'])){
				$Ent->setSiren($_POST['siren']);
			}
			
			if (!empty($_POST['pays_ent'])){
				$Ent->setPays($_POST['pays_ent']);
			}
			
			$Ent->update();
			
			foreach($_POST as $key=>$value){
				$_SESSION['ajout_ent.' . $key] = $value;
			} 
			header("Location: ". $SITE_BASE . "moncompte.php");
		}
	}
	
?>