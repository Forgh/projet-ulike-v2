<?php 
	include('modeles/Note.php');
	$notes=Note::getNotesParAuteur($_SESSION['pseudo_membre']);
	foreach($notes as $values) {?>
		<input type="checkbox" name="notes[]" value="<?php echo $values['id_note'] ?>">
	<?php}
?>