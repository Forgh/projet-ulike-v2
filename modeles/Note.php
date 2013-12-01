<?php
	include('modeles/connect.php');

	class Note {
		//les attributs:
		private $pseudo;
		private $commentaire;
		private $objet;
		
		//les methodes:
		public function getPseudo() { //un getter
			return $this->pseudo;
		}

		public function getCommentaire() { //un getter
			return $this->commentaire;
		}
		
		public function getObjet(){
			return $this->objet;
		}
		
		public function getId(){
			global $bdd;
			$idmax=$bdd->query("SELECT MAX(id_note) FROM notes") or die("Erreur => MAX Note.construct($id)");
			$result = $idmax -> fetch();
			$ret = $result[0];
			return $ret;
		}

		public function __construct ($pseudo, $commentaire, $objet) {
            global $bdd;
            $this->pseudo = $pseudo;
            $this->commentaire = $commentaire;
            $this->objet = $objet;
        }

		public function save() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('INSERT INTO notes(nom_objet_source, commentaire, pseudo_auteur) VALUES (:nom_objet_source, :commentaire, :pseudo_auteur)');
				$nouveau_membre -> execute(array(
								'nom_objet_source'=>$this->objet,
								'commentaire' => $this->commentaire, 
								'pseudo_auteur' => $this->pseudo, 
								));
				
		}
		
		public function fetchNotesByObjet($nom){
			global $bdd;
			$req = $bdd->prepare('SELECT * FROM notes WHERE nom_objet_source = ? ORDER BY id_note DESC');
			$req ->execute(array($nom));
			
			return $req->fetchAll();
		}
		
		public function existeNotesByObjetAndPseudo($nom,$pseudo){
			global $bdd;
			$req = $bdd->prepare('SELECT * FROM notes WHERE nom_objet_source = ? AND pseudo_auteur = ?');
			$req ->execute(array($nom,$pseudo));
			$ret = $req->fetchAll();
			if (count($ret)==0) {
			return true;
			}
			else {
			return false;
			}
		}

	}

?>
