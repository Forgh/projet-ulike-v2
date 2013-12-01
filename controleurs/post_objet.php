<?php
				require('modeles/Objet.php');
				
				//On rename le fichier avec un nom hashé en md5 (histoire d'éviter les noms de fichiers foireux fait par les utilisateurs... Never Trust User Input)
				//Le fichier a été renommé de manière identique lors de son upload en AJAX
				$info = pathinfo($_POST['nom_image']);
				$file_name =  basename($_POST['nom_image'],'.'.$info['extension']);
				$extension_upload = strtolower( strrchr($_POST['nom_image'], '.')  );
				$id_image=md5($file_name);
				$link_thumbnail = "imgs/objets/{$id_image}_thumbnail{$extension_upload}";
				
				//On en fait un objet... Objet, puis on le sauvegarde
				$nouvel_objet = new Objet($_POST['nom_objet'], $_SESSION['login_entreprise'],$_POST['categorie_objet'],$_POST['description'],$link_thumbnail);
				$nouvel_objet->save();
				
				header( 'Location: http://projets-lightdark.fr/ulike/post_ajout_objet.php');
?>