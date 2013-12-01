<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
		<title> ULike </title>
		<script>$(document).ready(function() {
					var inputField= $('#id_objet').val();
					$( "#afficher" ).click(function () {
				   		$( "#otherMarks" ).load( 'controleurs/show_note.php?objet='+inputField );
				    });
				    });
</script>
		
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >

			<h2>Présentation d'un objet</h2>
			<?php require('controleurs/statistique_objet.php'); ?>
			<div class="moitieDroite">	
				<p><span class="presentationObjetLbl">Nom :</span><?php echo $constructeur_objet;?> - <?php echo $nom_objet; ?></p>
				<p><span class="presentationObjetLbl">Catégorie :</span> <?php echo $categorie_objet; ?></p>
				<p><span class="presentationObjetLbl">Description :</span> <?php echo $description_objet; ?></p>
				<div class="likesNumber">
					<img class="photoObjet" src="css/design/like.png" ></img>
					<p><?php echo $total_like;?></p>
				</div>
				<div class="dislikesNumber">
					<p><?php echo $total_dislike; ?></p><img class="photoObjet" src="css/design/dislike.png" ></img>
				</div>
			</div>
			<div class="moitieGauche border">	
				<img class="photoObjet" src="<?php echo $img_objet; ?>" alt="<?php echo $nom_objet; ?>" width='256' height='256'></img>
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
			<p>			
			<form action="" method="post" enctype="multipart/form-data">	
				<input type="hidden" id="id_objet" value="<?php echo $_GET['objet']; ?>"	>				
				<input type="submit" id="afficher" value="En voir [+]...">
			</form>
</p>
<div id="otherMarks"></div>
		</div>
		
		<?php include("include/footer.php");?>
				
	</body>
</html>

