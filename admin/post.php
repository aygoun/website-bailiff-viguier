<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

require '../connex.php';
if(isset($_POST['envoyer'])){

	$taille_maxi = 4000000;
	$extensions = array('.png', '.jpg', '.jpeg, ', '.pdf', '.doc', '.docx');

// Premier fichier
$filePath1 = 'none';
if (array_key_exists('photo_vente', $_FILES)) {
	$taille1 = filesize($_FILES['photo_vente']['tmp_name']);
	$extension1 = strtolower(strrchr($_FILES['photo_vente']['name'], '.'));

	//Début des vérifications de sécurité...
	if(!in_array($extension1, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		$erreur1 = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc... n1';
	}
	if($taille1>$taille_maxi)
	{
		$erreur1 = 'Le fichier est trop gros... n1';
	}
	$paGe1 = rand();
	if(!isset($erreur1)) //S'il n'y a pas d'erreur, on upload
	{
		$fichier1 = basename($_FILES['photo_vente']['name']);
		$fichier1 = strtr($fichier1,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier1 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier1);
		$filePath1 = 'upload/photos_ventes/' . $paGe1 . '/' . $fichier1;
		$relativeFilePath1 = '../' .$filePath1;
		mkdir(dirname($relativeFilePath1), 0777, true);

		if(move_uploaded_file($_FILES['photo_vente']['tmp_name'], $relativeFilePath1)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
			echo 'Upload effectué avec succès n1 !<br>';
		}
		else //Sinon (la fonction renvoie FALSE).
		{
			echo 'Echec de l\'upload n1 !';
		}
	}
	else
	{
		echo 'Echec de l\'upload du fichier n1!';
		echo $erreur1;
	}
}

//Deuxieme fichier
$filePath2 = 'none';
if (array_key_exists('photo_carte_grise', $_FILES)) {
	$taille2 = filesize($_FILES['photo_carte_grise']['tmp_name']);
	$extension2 = strtolower(strrchr($_FILES['photo_carte_grise']['name'], '.'));

	//Début des vérifications de sécurité...
	if(!in_array($extension2, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		$erreur2 = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...n2 ';
	}
	if($taille2>$taille_maxi)
	{
		$erreur2 = 'Le fichier est trop gros... n2 ';
	}
	$paGe2 = rand();
	if(!isset($erreur2)) //S'il n'y a pas d'erreur, on upload
	{
		$fichier2 = basename($_FILES['photo_carte_grise']['name']);
		$fichier2 = strtr($fichier2,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier2 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier2);
		$filePath2 = 'upload/photos_cartes_grises/' . $paGe2 . '/' . $fichier2;
		$relativeFilePath2 = '../' .$filePath2;
		mkdir(dirname($relativeFilePath2), 0777, true);

		if(move_uploaded_file($_FILES['photo_carte_grise']['tmp_name'], $relativeFilePath2)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
			echo 'Upload effectué avec succès n2 !<br>';
		}
		else //Sinon (la fonction renvoie FALSE).
		{
			echo 'Echec de l\'upload n2 !';
		}
	}
	else
	{
		echo 'Echec de l\'upload du fichier n2!';
		echo $erreur2;
	}
}

// Troisième fichier
$filePath3 = 'none';
if (array_key_exists('fichier_materiel', $_FILES)) {
	$taille3 = filesize($_FILES['fichier_materiel']['tmp_name']);
	$extension3 = strtolower(strrchr($_FILES['fichier_materiel']['name'], '.'));

	//Début des vérifications de sécurité...
	if(!in_array($extension3, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		$erreur3 = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...n3';
	}
	if($taille3>$taille_maxi)
	{
		$erreur3 = 'Le fichier est trop gros... n3';
	}
	$paGe3 = rand();
	if(!isset($erreur3)) //S'il n'y a pas d'erreur, on upload
	{
		$fichier3 = basename($_FILES['fichier_materiel']['name']);
		$fichier3 = strtr($fichier3,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier3 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier3);
		$filePath3 = 'upload/photos_materiel/' . $paGe3 . '/' . $fichier3;
		$relativeFilePath3 = '../' .$filePath3;
		mkdir(dirname($relativeFilePath3), 0777, true);

		if(move_uploaded_file($_FILES['fichier_materiel']['tmp_name'], $relativeFilePath3)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
			echo 'Upload effectué avec succès n3!<br>';
		}
		else //Sinon (la fonction renvoie FALSE).
		{
			echo 'Echec de l\'upload n3 !';
		}
	}
	else
	{
		echo 'Echec de l\'upload du fichier n3 !';
		echo $erreur3;
	}
}
// Troisième fichier
$filePath4 = 'none';
if (array_key_exists('fichier_controle_technique', $_FILES)) {
	$taille4 = filesize($_FILES['fichier_controle_technique']['tmp_name']);
	$extension4 = strtolower(strrchr($_FILES['fichier_controle_technique']['name'], '.'));

	//Début des vérifications de sécurité...
	if(!in_array($extension4, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		$erreur4 = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...n3';
	}
	if($taille4>$taille_maxi)
	{
		$erreur4 = 'Le fichier est trop gros... n3';
	}
	$paGe4 = rand();
	if(!isset($erreur4)) //S'il n'y a pas d'erreur, on upload
	{
		$fichier4 = basename($_FILES['fichier_controle_technique']['name']);
		$fichier4 = strtr($fichier4,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		$fichier4 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier4);
		$filePath4 = 'upload/photos_controle_technique/' . $paGe4 . '/' . $fichier4;
		$relativeFilePath4 = '../' .$filePath4;
		mkdir(dirname($relativeFilePath4), 0777, true);

		if(move_uploaded_file($_FILES['fichier_controle_technique']['tmp_name'], $relativeFilePath4)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		{
			echo 'Upload effectué avec succès n4!<br>';
		}
		else //Sinon (la fonction renvoie FALSE).
		{
			echo 'Echec de l\'upload n4 !';
		}
	}
	else
	{
		echo 'Echec de l\'upload du fichier n4 !';
		echo $erreur4;
	}
}

	$mainNumber = rand();
	$title=$_POST['title_vente'];
	$time=$_POST['time_vente'];
	$date=$_POST['date_vente'];
	$lieu=$_POST['lieu_vente'];
	$resultat = $bdd->prepare('INSERT INTO `ventes_encheres`(`num_page`,`title`,`heure`, `date_bd`, `lieu`, `link_media`, `link_cartesGrises`, `link_materiel`, `link_controle_technique`) VALUES (?,?,?,?,?,?,?,?,?)');
	$resultat->execute(array($mainNumber, $title, $time, $date, $lieu, $filePath1, $filePath2, $filePath3, $filePath4));

	if($resultat->errorCode() == 0) {
		header("refresh:2;url=index.php");
		echo '<h1>Votre requête a été enregistrée !<br>Vous allez être redirigé...</h1>';
	} else {
		$errors = $resultat->errorInfo();
		echo($errors[2]);
	}
}
else {
	echo "ERREUR";
}
?>
