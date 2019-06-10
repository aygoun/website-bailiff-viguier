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
	$reponse = $bdd->query('SELECT * FROM ventes_encheres ORDER BY date_bd ASC');
	?>

</head>
<body>
	<h1 style="margin-left: -15rem; text-align: center;">ADMIN / www.huissier-viguier.com</h1>
	<div class="row">
		<div class="all-page col-md-4" style="margin-left: -15rem;margin-top: 1em;  font-size: 0.9em;">
			<form action="post.php" method="POST" enctype="multipart/form-data">
				<label>Titre de la vente : </label>
				<input type="text" name="title_vente" required>
				<br><br>
				<label>Heure de la vente : </label>
				<input type="time" name="time_vente" required>
				<br><br>
				<label>Date de la vente : </label>
				<input type="date" name="date_vente" required>
				<br><br>
				<label>Lieu de la vente : </label>
				<input type="text" name="lieu_vente" required>
				<br><br>
				<!-- On limite le fichier à 4Mo -->
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Fichier des photos de la vente (fichier en JPG ou PNG pour être affiché sur la page)< 4Mo:</span><input type="file" name="photo_vente">
				<br><br>
				<!-- On limite le fichier à 4Mo -->
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Photo des cartes grises la vente < 4Mo:</span><input type="file" name="photo_carte_grise">
				<!-- On limite le fichier à 4Mo -->
				<br><br>
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
				<span class="strg">Fichier du matériel de la vente < 4Mo:</span><input type="file" name="fichier_materiel">
				<br><br>

				<input type="submit" name="envoyer" value="Envoyer la requête" class="btn btn-danger" />
			</form>
		</div>
		<br><br>
		<div class="all-page col-md-6" style="margin-top: 1em; margin-left: 5em;">
			<table>
				<thead>
					<tr>
						<th>Heure</th>
						<th>Date</th>
						<th>Lieu</th>
						<th>Matériel</th>
						<th>Carte grise</th>
						<th>Photo</th>
						<th>SUPPRIMER</th>
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
							<td><a href="http://viguier-huissier.com<?php echo $donnees['link_materiel'];?>"><?php echo basename($donnees['link_materiel']);?></a></td>
							<td><a href="http://viguier-huissier.com<?php echo $donnees['link_cartesGrises'];?>"><?php echo basename($donnees['link_cartesGrises']);?></a></td>
							<td><a href="http://viguier-huissier.com<?php echo $donnees['link_media'];?>"><?php echo basename($donnees['link_media']);?></a></td>
							<td><a href="delete.php?num_page=<?php echo $donnees['num_page']; ?>">SUPPRIMER</a></td>
						</tr>

						<?php
					} //fin de la boucle, le tableau contient toute la BDD
					$reponse->closeCursor(); // Termine le traitement de la requête
					
					/*

					<td>
						<!-- <?php if ($donnees['link_materiel'] != 'none'){?> -->
						<a href="http://viguier-huissier.com<?php echo $donnees['link_materiel'];?>"><?php echo basename($donnees['link_materiel']);?></a>
						<!-- <?php}else{ echo "Aucun fichier";}?> -->
					</td>
					<td>
						<!-- <?php if ($donnees['link_cartesGrises'] != 'none'){?> -->
							<a href="http://viguier-huissier.com<?php echo $donnees['link_cartesGrises'];?>"><?php echo basename($donnees['link_cartesGrises']);?></a>
							<!-- <?php}else{ echo "Aucun fichier";}?> -->
					</td>
					<td>
						<!-- <?php if ($donnees['link_media'] != 'none'){?> -->
							<a href="http://viguier-huissier.com<?php echo $donnees['link_media'];?>"><?php echo basename($donnees['link_media']);?></a>
							<!-- <?php}else{echo "Aucun fichier";}?> -->
					</td>

					*/
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
