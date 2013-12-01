<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" >
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" >
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<title> ULike </title>
		<script>$( "#userCas" ).click(function() {
$( "#otherMarks" ).slideDown( "slow", function() {
// Animation complete.
});
});
</script>
		
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >

			<h2>Présentation d'un objet</h2>
			<?php if(isset($_GET['objet'])){ 
			 include('controleurs/statistique_objet.php'); ?>
			<div class="moitieDroite">	
				<p><span class="presentationObjetLbl">Nom :</span><?php echo $constructeur_objet;?> - <?php echo $nom_objet; ?></p>
				<p><span class="presentationObjetLbl">Catégorie :</span> <?php echo $categorie_objet; ?></p>
				<p><span class="presentationObjetLbl">Description :</span> <?php echo $description_objet; ?></p>
				<div class="likesNumber">
					<img class="photoObjet" src="css/design/like.png" />
					<p><?php echo $total_like;?></p>
				</div>
				<div class="dislikesNumber">
					<p><?php echo $total_dislike; ?></p><img class="photoObjet" src="css/design/dislike.png"/>
				</div>
			</div>
			<div class="moitieGauche border">	
				<img class="photoObjet" src="<?php echo $img_objet; ?>" alt="<?php echo $nom_objet; ?>" width='256' height='256' />			
			</div>
			<div id="zoneenregistre">
	<ul id="zonelike">
		<?php 
			if($total_ergonomie>0){
				?><li><img src="imgs/ergo.png" alt="On aime : l'ergonomie"/></li><?php
			}
			if($total_design>0){
				?><li><img src="imgs/design.png" alt="On aime : le design"/></li><?php
			}
			if($total_qualite>0){
				?><li><img src="imgs/qualite-prix.png" alt="On aime : le rapport qualité/prix"/></li><?php
			}
		?>
	</ul>
	<ul id="zonedislike">
		<?php 
			if($total_ergonomie<0){
				?><li><img src="imgs/ergo.png" alt="On n'aime pas : l'ergonomie"/></li><?php
			}
			if($total_design<0){
				?><li><img src="imgs/design.png" alt="On n'aime pas : le design"/></li><?php
			}
			if($total_qualite<0){
				?><li><img src="imgs/qualite-prix.png" alt="On n'aime : pas le rapport qualité/prix"/></li><?php
			}
		?>
	</ul>
		
</div>
<?php include('controleurs/verif_existe_note.php'); ?>
<p>			
			<div class="msgbox_btn_box">
				<div class="bouton bleu" id="userCas">En voir [+]</div>
			</div>
</p>
<div id="otherMarks"><?php include('controleurs/show_note.php'); ?></div>		
<?php }
		else {
			echo '<p>Désolé, il y a une erreur sur cette page, l\'objet n\'existe pour ou une erreur est apparue au chargement de cette page</p>';
		}
		?>
		</div>
		
		<?php include("include/footer.php");?>
				
	</body>
</html>

