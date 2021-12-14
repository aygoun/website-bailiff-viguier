<?php //Connection avec la BDD.
ini_set('display_errors','on');
error_reporting(E_ALL);

require '../connex.php';

$Page = $_GET['num_page'];
$resultat = $bdd->prepare('DELETE FROM `ventes_encheres` WHERE num_page= ?');
$resultat->execute(array($Page));

header("refresh:2;url=index.php");
echo "<h1>Votre requête a été enregistrée !<br>Vous allez être redirigé</h1>";
?>
