<?php
	include('../modeles/connect.php');

	class Membre {
		//les attributs:
		private $id;
		private $pseudo;
		private $nom;
		private $prenom;
		private $email;
		private $hashCode;		
		private $age;
		private $sexe;
		private $emailConfirme;
		
		//les methodes:
		public function getPseudo() { //un getter
			return $this->pseudo;
		}

		public function getNom() { //un getter
			return $this->nom;
		}

		public function setNom($v) { //un setter
			$this->nom  = $v;
		}
		
		public function getPrenom() { //un getter
			return $this->prenom;
		}

		public function getEmail() { //un getter
			return $this->email;
		}

		public function getHashCode() { //un getter
			return $this->hashCode;
		}

		public function getAge() { //un getter
			return $this->age;
		}

		public function getSexe() { //un getter
			return $this->sexe;
		}

		public function getPasswd() { //un getter
			return $this->hashCode;
		}
		
		public function setPrenom($v) { 
			 $this->prenom=$v;
		}

		public function setEmail($v) { 
			 $this->email=$v;
		}

		public function setHashCode($v) { 
			 $this->hashCode=$v;
		}

		public function setAge($v) { 
			 $this->age=$v;
		}

		public function setSexe($v) { 
			 $this->sexe=$v;
		}

		public function setPasswd($v) { 
			 $this->hashCode=$v;
		}
		
		public function isEmailConfirmed() { //un getter
		
			if ($this->emailConfirme == 1){
				return true;
			}else{
				return false;	
			}
		}
		//Un constructeur
		public function __construct ($pseudo, $passwd,$email, $nom, $prenom, $age, $sexe,  $emailConfirme ) { 
			$this->pseudo = $pseudo;
			$this->nom = $nom;
			$this->email = $email;
			$this->hashCode = $passwd;
			$this->age = $age;
			$this->prenom = $prenom;
			$this->sexe = $sexe;
			$this->emailConfirme = $emailConfirme;
		}

		/*public function __construct ($pseudo, $passwd,$email,  $emailConfirme, $nom, $prenom, $age, $sexe, $id ) { 
			$this->pseudo = $pseudo;
			$this->nom = $nom;
			$this->email = $email;
			$this->hashCode = $passwd;
			$this->age = $age;
			$this->sexe = $sexe;
			$this->emailConfirme = $emailConfirme;
			$this->id = $id;
		}
*/

		public function save() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('INSERT INTO membres(pseudo_membre, passwd_membre, email_membre, confirmed_email, nom_membre, prenom_membre, date_naissance_membre, sexe_membre) VALUES (:pseudo_membre, :passwd_membre, :email_membre, :confirmed_email, :nom_membre, :prenom_membre, :date_naissance_membre, :sexe_membre)');
				$nouveau_membre -> execute(array(
								'pseudo_membre' => $this->pseudo, 
								'passwd_membre' => $this->hashCode, 
								'email_membre' => $this->email, 
								'confirmed_email' => $this->emailConfirme, 
								'nom_membre'=> $this->nom, 
								'prenom_membre'=>$this->prenom, 
								'date_naissance_membre'=> $this->age, 
								'sexe_membre'=> $this->sexe
								));
		}
		
		public function update() {
				global $bdd;
				$nouveau_membre = $bdd -> prepare('UPDATE membres SET passwd_membre = :passwd_membre, email_membre = :email_membre, confirmed_email = :confirmed_email, nom_membre = :nom_membre, prenom_membre = :prenom_membre, date_naissance_membre = :date_naissance_membre, sexe_membre = :sexe_membre WHERE pseudo_membre=:pseudo_membre');
				$nouveau_membre -> execute(array(
								'pseudo_membre' => $this->pseudo, 
								'passwd_membre' => $this->hashCode, 
								'email_membre' => $this->email, 
								'confirmed_email' => $this->emailConfirme, 
								'nom_membre'=> $this->nom, 
								'prenom_membre'=>$this->prenom, 
								'date_naissance_membre'=> $this->age, 
								'sexe_membre'=> $this->sexe
								));
		}

		public static function getMembreParPseudo ($pseudo){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE pseudo_membre=?');
			$req -> execute(array($pseudo));
			
			if($req->rowCount() == 0) return null;
			$tuple =  $req->fetch(); //(PDO::FETCH_OBJ);
			
			//echo "?", $tuple['pseudo_membre'],"?";
			
			return new Membre($tuple['pseudo_membre'], $tuple['passwd_membre'], $tuple['email_membre'], $tuple['nom_membre'], $tuple['prenom_membre'], $tuple['date_naissance_membre'], $tuple['sexe_membre'], $tuple['confirmed_email']);
		}
		
		public static function getMembreParEmail ($email){
			global $bdd;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE email_membre=?');
			$req -> execute(array($email));
			
			if($req->rowCount() == 0) return null;
			$tuple =  $req->fetch();
			
			return new Membre($tuple['pseudo_membre'], $tuple['passwd_membre'], $tuple['email_membre'], $tuple['nom_membre'], $tuple['prenom_membre'], $tuple['date_naissance_membre'], $tuple['sexe_membre'], $tuple['confirmed_email']);
		}	
		
		public function setConfirmed() {
			global $bdd;
			$confirm = $bdd -> prepare('UPDATE membres SET confirmed_email = 1 WHERE pseudo_membre =? ');
			$confirm -> execute(array($this->getPseudo()));
		}

		public static function existe ($nom){ //0: ok & 1: pas ok
			global $bdd;
			$ok = true;
			$req = $bdd -> prepare('SELECT * FROM membres WHERE pseudo_membre=?');
			$req -> execute(array($nom));
			$ret = $req->fetchAll();

			return (count($ret)!=0); // erreur
		}	
		
	}
?>
