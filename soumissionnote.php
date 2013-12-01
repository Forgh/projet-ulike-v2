<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css" />
			   <link rel="stylesheet" href="css/css-drag.css" />
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

		<script>
			$(function() 
			{
				$("#reserve_like").sortable(
				{
					connectWith: '.connectedList',
				    receive: function (event, ui) {
								var element = ui.item.find('input');
								element.attr('name','');
								//change name on element here
							} 
				});
				$("#zonelike").sortable(
				{
					connectWith: '.connectedList',
				    receive: function (event, ui) {
								var element = ui.item.find('input');
								element.attr('name','likes[]');
								//change name on element here
							} 
				});
				$("#zonedislike").sortable(
				{
					connectWith: '.connectedList',
				    receive: function (event, ui) {
								var element = ui.item.find('input');
								element.attr('name','dislikes[]');
								//change name on element here
							} 
				});
			});
		</script>

		<title> ULike - Ajouter une note </title>
	</head>
	
	<body>
		<?php include("include/entete.php"); ?>
		<div id="bodycentered" >
			<h2>Ajoutez votre note :</h2>
			<form  action="controleurs/post_note.php" method="post" enctype="multipart/form-data">
			
				<p>
					<ul id="reserve_like" class="connectedList"> 
						<li><input name="" type="hidden" value="Ergonomie"/><img src="imgs/ergo.png" alt="Ergonomie"/></li>
						<li><input name="" type="hidden" value="Design"/><img src="imgs/design.png" alt="Design"/></li>
						<li><input name="" type="hidden" value="Qualité-Prix"/><img src="imgs/qualite-prix.png" alt="Rapport Qualité/Prix"</li>
					</ul>
				</p>
				
				<div id="zoneenregistre">
					<ul id="zonelike" class="connectedList"></ul>
					<ul id="zonedislike" class="connectedList"></ul> 
				</div>
				<div id="zonecommentaire">
				<p>
					<label for="commentaire">Commentaire : </label>
				</p>
				<p>
					<textarea id="commentaire" name="commentaire" placeholder="Quelque chose à rajouter ? Ajoutez ici votre commentaire !"></textarea>
				</p>
				</div>
					
				<p>
					<input class="center" type="submit" value="Envoyer"/>
				</p>
		
			</form>
		</div>
		
		<?php include("include/footer.php"); ?>
	</body>
</html>