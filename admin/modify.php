<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
?>
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
</head>
<?php //Connection avec la BDD.

include '../connex.php';
/* Set locale to France */
setlocale(LC_ALL, 'fr_FR');
$reponse = $bdd->prepare('SELECT * FROM ventes_encheres WHERE num_page= ?');
$reponse->execute(array($_GET['w']));

?>
<body>
  <div class="col-12" style="margin-top: 0.8em;margin-left: -10em!important;" id="tableCSS">
    <center style="width:100%;">
      <table style="width:100%; margin: 0em, 0.5em, 0em, 0.5em;">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Heure</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Photo</th>
            <th>VALIDER</th>
          </tr>
        </thead>
        <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
        while ($donnees = $reponse->fetch())
        {
          ?>
        <tbody>
          <tr>
            <form action="postUpdate.php?w=<?php echo $donnees['num_page'];?>" method="POST" enctype="multipart/form-data">
              <td><input type="text" name="title" value="<?php echo $donnees['title']; ?>"/></td>
              <td><input type="time" name="heure" value="<?php echo $donnees['heure']; ?>"/></td>
              <td><input type="date" name="date" value="<?php echo $donnees['date_bd']; ?>"/></td>
              <td><input type="text" name="lieu" value="<?php echo $donnees['lieu'];?>"/></td>

              <td>
                <label class="labelFont">Liste matériel :</label>
                <!-- On limite le fichier à 4Mo -->
        				<input type="hidden" name="MAX_FILE_SIZE" value="4000000">
                <input type="file" name="fichier_materiel"/><br>

                <label class="labelFont">Fichier carte(s) grise(s) :</label>
                <!-- On limite le fichier à 4Mo -->
                <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
                <input type="file" name="photo_carte_grise"/><br>

                <label class="labelFont">Photos :</label>
                <!-- On limite le fichier à 4Mo -->
                <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
                <input type="file" name="photo_vente"/>

                <label class="labelFont">Contrôle technique :</label>
                <!-- On limite le fichier à 4Mo -->
                <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
                <input type="file" name="liste_controle_technique"/>
              </td>
              <td>
                <input type="submit" name="Submit" value="VALIDER">
              </td>
            </form>
          </tr>
            <?php
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
          ?>
        </tbody>
      </table>
      <H3 style="margin-top: 1em; font-size: 2em;"><span style="color: #8B0000;">Attention</span>, veuillez seulment ajouter les fichiers que vous voulez modifier.</H3>
    </center>
  </div>
</body>
</html>
