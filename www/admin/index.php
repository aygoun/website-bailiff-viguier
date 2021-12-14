<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Armand BLIN">
	<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../vendor/devicons/css/devicons.min.css" rel="stylesheet">
	<link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="../css/resume.min.css" rel="stylesheet">
	<link rel="icon" href="../img/favicon.ico" />
	<title>ADMIN - www.huissier-viguier.com</title>

	<?php include '../connex.php'; ?>
	<?php //Connection avec la BDD.
	setlocale(LC_ALL, 'fr_FR');
	$reponse = $bdd->query('SELECT * FROM ventes_encheres WHERE (date_bd >= CURDATE() ) ORDER BY date_bd ASC');
	header('Content-type: text/html; charset=UTF-8');
	?>

	<script>
	function showDiv(divId, element)
	{
	    document.getElementById(divId).style.display = element.value == "vente" ? 'block' : 'none';
			document.getElementById("jeu_tirage").style.display = element.value == "vente" ? 'block' : 'inline';

	}
	</script>

	<style>
	#hidden_div {
	  display: inline;
	}
	#jeu_tirage {
		display: none;
	}
	body{
		padding-left: 0em!important;
	}
	</style>

	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />

</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center; height: 100%; weight: 100%;">ADMIN / www.huissier-viguier.com</h1>
		</div>
	</div>

	<center><a href="#addEvent"><button type="button" class="btn btn-danger">Ajouter un évènement</button></a></center>

	<center>
	<div class="row">
			<br><br>
			<div class="all-page col-md-12" style="margin-top: 1em; margin-left: 0em;">
				<table>
					<thead>
						<tr>
							<th>Heure</th>
							<th>Date</th>
							<th>Lieu</th>
							<th>Matériel</th>
							<th>Carte grise</th>
							<th>Contrôle technique</th>
							<th>Règlement Jeu-Tirage</th>
							<!--th>Photo</th-->
							<th>SUPPRIMER/MODIFIER</th>
						</tr>
					</thead>
					<tbody>
						<?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
						while ($donnees = $reponse->fetch())
						{
							?>
							<tr>
								<td><?php echo strftime("%H:%M", strtotime($donnees['heure'])); ?></td>
								<td><?php echo strftime("%A %e %B %Y", strtotime($donnees['date_bd'])); ?></td>
								<td><?php echo $donnees['lieu'];?></td>
								<td>
									<?php if($donnees['link_materiel'] != 'none'){
										?>
										<a href="http://viguier-huissier.com/<?php echo $donnees['link_materiel'];?>" target="_blank"><?php echo basename($donnees['link_materiel']);?></a>
										<?php
									}else{
										echo "/";
									}?>
								</td>
								<td>
									<?php if($donnees['link_cartesGrises'] != 'none'){
										?>
										<a href="http://viguier-huissier.com/<?php echo $donnees['link_cartesGrises'];?>" target="_blank"><?php echo basename($donnees['link_cartesGrises']);?></a>
										<?php
										}else{
											echo "/";
										}?>
								</td>
								<td>
									<?php if($donnees['link_controle_technique'] != 'none'){
										?>
										<a href="http://viguier-huissier.com/<?php echo $donnees['link_controle_technique'];?>" target="_blank"><?php echo basename($donnees['link_controle_technique']);?></a>
										<?php
										}else{
											echo "/";
										}?>
								</td>
								<td>
									<?php if($donnees['reglement_jeu_tirage'] != 'none'){
										?>
										<a href="http://viguier-huissier.com/<?php echo $donnees['reglement_jeu_tirage'];?>" target="_blank"><?php echo basename($donnees['reglement_jeu_tirage']);?></a>
										<?php
										}else{
											echo "/";
										}?>
								</td>
								<!--td>
									<?php if($donnees['link_media'] != 'none'){
										?>
										<a href="http://viguier-huissier.com/<?php echo $donnees['link_media'];?>" target="_blank"><?php echo basename($donnees['link_media']);?></a>
										<?php
										}else{
											echo "/";
										}?>
								</td-->
								<td><a href="delete.php?num_page=<?php echo $donnees['num_page']; ?>">SUPPRIMER</a><br><a href="modify.php?w=<?php echo $donnees['num_page']; ?>">MODIFIER</a></td>
							</tr>

							<?php
						} //fin de la boucle, le tableau contient toute la BDD
						$reponse->closeCursor(); // Termine le traitement de la requête
						?>
					</tbody>
				</table>
			</div>
	</div>
</center>


	<div id="addEvent" class="all-page col-md-4" style="margin-top: 1em;  font-size: 0.9em;">
		<form action="post.php" method="POST" enctype="multipart/form-data">
			<label for="choice" style="font-weight: 700; color: red;">Quel type de donnée voulez-vous ajouter :</label>
			<select name="choice" id="choice" onchange="showDiv('hidden_div', this)">
					<option disabled value="">--Veuillez choisir une option--</option>
					<option value="vente" selected>Une vente</option>
					<option value="jeu">Un jeu-concours</option>
			</select>
			<br><br>
			<label>Titre de l'évènement : </label>
			<input type="text" name="title_vente" required>
			<br><br>
			<div id="hidden_div">
			<label>Heure de la vente : </label>
			<input type="time" name="time_vente">
			<br><br>
			<label>Date de la vente : </label>
			<input type="date" name="date_vente">
			<br><br>
			<label>Lieu de la vente : </label>
			<input type="text" name="lieu_vente">
			<br><br>


				<!-- On limite le fichier à 4Mo -->
				<!--input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Fichier des photos de la vente (fichier en JPG ou PNG pour être affiché sur la page)< 4Mo:</span><input type="file" name="photo_vente">
				<br><br-->
				<span class="strg">Photos de la vente (fichier en JPG, PNG, JPEG ou GIF) :</span>
				<input type="file" name="files[]" multiple >
				<br><br>
				<!-- On limite le fichier à 4Mo -->
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Photo des cartes grises la vente < 4Mo:</span><input type="file" name="photo_carte_grise">
				<!-- On limite le fichier à 4Mo -->
				<br><br>
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Fichier du matériel de la vente < 4Mo:</span><input type="file" name="fichier_materiel">
				<!-- On limite le fichier à 4Mo -->
				<br><br>
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Fichier du contrôle technique < 4Mo:</span><input type="file" name="fichier_controle_technique">
				<br><br>
			</div>
			<div id="jeu_tirage">
				<!-- On limite le fichier à 4Mo -->
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg ">Règlement du Jeu-Tirage (< 4Mo) :</span><input type="file" name="reglement_jeu_tirage">
				<br><br>
			</div>

			<input type="submit" name="envoyer" value="Envoyer la requête" class="btn btn-danger" style="margin-bottom: 2em;"/>
		</form>
	</div>

</body>
</html>
