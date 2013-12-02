<?php
	include('modeles/connect.php');

	class Objet {
		//les attributs:

		private $nom;
		private $proprietaire;
		private $categorie;
		private $description;
		private $img;
		
		//les methodes:
		public function getNom() { //un getter
			return $this->nom;
		}

		public function getProprietaire() { //un getter
			return $this->proprietaire;
		}

		public function getCategorie() { //un getter
			return $this->categorie;
		}
		
		public function getDescription() {
			return $this->description;
		}

		public function getImg() {
			return $this->img;
		}

		//Un constructeur
		public function __construct ($nom, $proprietaire,$categorie,$description,$img) { 
			global $bdd;
			$this->nom = $nom;
			$this->proprietaire = $proprietaire;
			$this->categorie = $categorie;
			$this->description= $description;
			$this->img = $img;
				
		}

	

		public function save() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('INSERT INTO objets (nom_objet, nom_proprietaire, categorie_objet, description_objet, img_objet) VALUES (:nom_objet, :nom_proprietaire, :categorie_objet, :description_objet, :img_objet)');
				$nouveau_membre -> execute(array(
								'nom_objet' => $this->nom, 
								'nom_proprietaire' => $this->proprietaire, 
								'categorie_objet' => $this->categorie, 
								'description_objet' => $this->description,
								'img_objet' => $this->img
								));
		}

		public static function getObjetParNom ($nom){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM objets WHERE nom_objet=?');
			$req -> execute(array($nom));
			
			if($req->rowCount()==0) return null;
			$tuple = $req->fetch();
			
			return new Objet($tuple['nom_objet'], $tuple['nom_proprietaire'], $tuple['categorie_objet'], $tuple['description_objet'], $tuple['img_objet']);
		}


		public function getObjetById($id) {
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM objets WHERE id_objet=?');
			$req -> execute(array($id));
			$tuple = $req->fetch();	
			$req->closeCursor();	
			
			return new Objet($tuple['nom_objet'], $tuple['nom_proprietaire'], $tuple['categorie_objet'], $tuple['description_objet'], $tuple['img_objet']);
		}
		
		public static function existe ($nom){
			global $bdd;
			$req = $bdd -> prepare('SELECT * AS compte FROM objets WHERE nom_objet=?');
			$req -> execute(array($nom));

			return $req->rowCount();
		}	

				
		public function getEveryNames () {
			global $bdd;
			$req = $bdd -> query('SELECT nom_objet FROM objets');
			$stack= array();
			while($ajouter_nom = $req -> fetch()){
				array_push($stack,$ajouter_nom);
			}
			
			return $stack;

		}
		
		public function getIdByNom($id) {
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM objets WHERE nom_objet = ?');
			$req->execute(array($id));
			
			return $req->fetchAll();
		}
		
		public function getLastInsertedObjet() {
			global $bdd;
			$req = $bdd -> query('SELECT * FROM objets WHERE id_objet = (SELECT MAX(id_objet) FROM objets)');
			$tuple = $req->fetch();	
			$req->closeCursor();	
			
			return new Objet($tuple['nom_objet'], $tuple['nom_proprietaire'], $tuple['categorie_objet'], $tuple['description_objet'], $tuple['img_objet']);
		}
		
		public function getLikeObjet($search) {
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM objets WHERE nom_objet LIKE ? OR nom_proprietaire LIKE ? OR categorie_objet LIKE ? OR description_objet LIKE ? LIMIT 0,10');
			$req->execute(array('%'.$search.'%','%'.$search.'%','%'.$search.'%','%'.$search.'%'));
			
			return $req->fetchAll();
		}

		public function seekAllCategories(){
			global $bdd;
			$categories=$bdd->query('SELECT nom_categorie FROM categories');
			return $categories->fetchAll();
		}
		
			
		
	}
?>
