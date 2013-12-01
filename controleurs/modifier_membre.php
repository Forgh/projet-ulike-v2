<?php
	session_start();
	

	include('../include/commun.php');
	include("../modeles/Membre.php");

	if (isset($_SESSION['pseudo_membre'])){
		$Ent = Membre::getMembreParPseudo($_SESSION['pseudo_membre']);
		//$megacondition = ($nb == 0 and empty($_POST['pseudo'])==false  and empty($_POST['passwd'])==false and empty($_POST['passwdconfirm'])==false and $_POST['passwd'] == $_POST['passwdconfirm'] and empty($_POST['nom_gerant'])==false and empty($_POST['mail_ent'])==false and !preg_match($regex, $_POST['mail_ent']) and empty($_POST['adr_ent'])==false and empty($_POST['code_ent'])==false and empty($_POST['pays_ent'])==false);// and (preg_match("(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$",$_POST['passwd_ent'] ));
	
		
		if ($Ent != null){
			if (!empty($_POST['passwd']) and empty($_POST['passwdconfirm'])==false and $_POST['passwd'] == $_POST['passwdconfirm'] ){
				$Ent->setHashCode(sha1($_POST['passwd']));
			}
			
			if (!empty($_POST['nom'])){
				$Ent->setNom($_POST['nom']);
			}
			
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
			if (!empty($_POST['mail']) and !preg_match($regex, $_POST['mail']) ){
				$Ent->setMail($_POST['mail']);
			}
			
			
			if (!empty($_POST['prenom'])){
				$Ent->setPrenom($_POST['prenom']);
			}
			
			if (!empty($_POST['age'])){
				$Ent->setAge($_POST['age']);
			}
			
			
			
			if (!empty($_POST['sexe'])){
				if ($_POST['sexe'] == "sexe_m"){
					$sexe = 'M';
				}elseif ($_POST['sexe'] == "sexe_f"){
					$sexe = 'F';
				}else{
					$sexe = 'A';
				}
				$Ent->setSexe($sexe);
			}
			
			
			$Ent->update();
			
			foreach($_POST as $key=>$value){
				$_SESSION['ajout_membre.' . $key] = $value;
			} 
			header("Location: ". $SITE_BASE . "moncompte.php");
			exit;
		}
	}
	echo "erreur";
?>