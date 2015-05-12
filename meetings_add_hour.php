<?php
session_start();
require_once 'settings/db_connect.php';
include 'functions/meetings_handler.php';
?>
<div class="row">
	<form action="meetings.php" method="post" class="lightbox-form">
		<div class="form-group">
			<label class="control-label">Heure de disponibilté</label>
			<input type="text" class="form-control" name="heure">
			<label class="control-label">Jour</label>
			<select name="jour" class="form-control">
				<option value="lundi">Lundi</option>
				<option value="mardi">Mardi</option>
				<option value="mercredi">Mercredi</option>
				<option value="jeudi">Jeudi</option>
				<option value="vendredi">Vendredi</option>
			</select>
			<br>
			<input type="submit" name="addDispo" value="Ajouter" class="btn btn-custom btn-custom-validate confirmAdd">
		</div>
	</form>
</div>