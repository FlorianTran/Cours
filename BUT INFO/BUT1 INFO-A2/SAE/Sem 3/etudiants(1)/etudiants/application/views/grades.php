<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Grades</title>
	<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1> Sujet </h1>
<p>
Durée : 1h15 / 1h140 Tiers temps
</p>
<p> Rendu : sur madoc </p>
<p> Le fichier de création de la table teacher se trouve dans data.</p>
<p>  Vous devez reproduire l'application suivante : </p>
<p> <img src="<?php echo base_url(); ?>/assets/images/rendu.png"></p>
<p> Un click sur + permet d'incrémenter la note, un click sur moins de la décrémenter </p>
<p> Le formulaire permet d'ajouter un nouvel enseignant.</p>
<h1> Composition</h1>
<table>
	<thead>
	<tr>
		<th> name </th>
		<th> grade </th>
		<th> + </th>
		<th> - </th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($teacher as $teacher): ?>
		<tr>
			<td><?= $teacher->getName()?></td>
			<td><?= $teacher->getGrade()?></td>
			<td> <a href="<?=base_url()."index.php/Teacher/increase/".$teacher->getName()?>"> + </a> </td>
			<td> <a href="<?=base_url()."index.php/Teacher/decrease/".$teacher->getName()?>"> - </a> </td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
<form action="<?=base_url()."index.php/Teacher/add"?>" method="post">
	<fieldset>
		<legend>Create</legend>
	<label>
		Name <input type="text" name="name" required>
	</label>
	<label>
		Grade <input type="number" name="grade" min="0" max="20" required value="10" >
	</label>
	<input type="submit" value="create">
	</fieldset>
</form>
</body>
</html>
