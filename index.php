<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css" />
		<title> ULike </title>
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >
		<h1>Bienvenue sur ULike !</h1>
			
			
			<p>ULike est un site communautaire de statistiques où chacun peut apporter une critique à des articles. Les membres qui participent au débat recoivent des réductions sur les articles.</p>
			
			
			<h2> Dernier article ajouté </h2>
			
			<?php require_once("controleurs/highlight_objet.php"); ?>
			
				<div class="accueilGauche">
					<a href="presentation.php?objet=<?php echo $idObjet; ?>"><img src="<?php echo $img_objet; ?>" width="150" height="150" alt="<?php echo $nom_objet; ?>"/></a>
				</div>
				
				<div class="liste_objet_vote">
					<img src="css/design/like.png" alt="likes"/>
						<p class="likesNumber"><?php echo $number_likes; ?></p>
						<p class="space"></p>
						<p class="dislikesNumber"><?php echo $number_dislikes; ?></p><img src="css/design/dislike.png" alt="dislike"/>
				</div>
				<p><span class="presentationObjetLbl">Nom:</span><span class="presentationObjetNom"><?php echo $constructeur_objet; ?> - <?php echo $nom_objet; ?></span></p>
				<p><span class="presentationObjetLbl">Categorie:</span><?php echo $categorie_objet; ?></p>
				<p><span class="presentationObjetLbl">Description:</span><?php echo $description_objet; ?></p>
							
			
			<div class="accueilDroite">
				<?php include('controleurs/highlight_objet.php');?>
			</div>	
			
			<div >
				<div class="msgObligatoire">IMPORTANT : afin de profiter des fonctions offertes par le site, veuillez activer Javascript</div>
			</div>
		</div>
		<?php include("include/footer.php");?>
				
	</body>
</html>

