<header>
	<a href="index.php" ><img id="logo" src="imgs/logos_ulike_small.png" alt="Logo ULike" /></a>
<div id="search">
		<form method="GET" name="form-test" id="form-test" action="search_results.php" enctype="multipart/form-data" >
		  	<input type="search" id="champ-texte" name="search" placeholder="Rechercher..." >
            <input type="submit" id="bouton-submit">
        </form>
	</div> 
	<div id="connexion">
	
	
		<?php
			if(isset($_SESSION['login_entreprise']) || isset($_SESSION['pseudo_membre'])) {
			?>
				
				<div class="bouton header">
					<a href="moncompte.php">Mon Compte</a>
				</div> 
				<div class="bouton header_out">
					<a href="deconnexion.php">Se Déconnecter</a>
				</div>
		<?php } 
			else {
			?>
				<div class="bouton header">
					<a href="login.php"> Se Connecter </a>
				</div>
				<div class="bouton header">
					<a href="inscription.php"> S'enregistrer</a>
				</div>
			<?php
			}
			?>
	</div>
</header>