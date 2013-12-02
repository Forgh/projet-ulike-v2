<?php 
	include('modeles/Objet.php');
	$notes=Note::getObjetParProprio($_SESSION['login_entreprise']);
	foreach($notes as $values) {?>
		<p><input type="checkbox" name="objets[]" value="<?php echo $values['id_note'] ?>"></p>
	<?php}
?>