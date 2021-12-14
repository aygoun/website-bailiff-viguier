<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
require '../connex.php';
if(isset($_POST['Submit'])){

  $NumberOfLigne=$_GET['w'];
  $taille_maxi = 4000000;
  $extensions = array('.png', '.jpg', '.jpeg, ', '.pdf', '.doc', '.docx');

//FICHIER PHOTO
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
        $req1 = $bdd->prepare('UPDATE ventes_encheres SET link_media = ? WHERE num_page = ?');
        $req1->execute(array($filePath1, $NumberOfLigne));
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
//FIN FICHIER PHOTO

//FICHIER CARTES GRISES
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
        $req2 = $bdd->prepare('UPDATE ventes_encheres SET link_cartesGrises = ? WHERE num_page = ?');
        $req2->execute(array($filePath2, $NumberOfLigne));
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
// FIN FICHIER CARTES GRISES

// FICHIER MATÉRIEL
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
        $req3 = $bdd->prepare('UPDATE ventes_encheres SET link_materiel = ? WHERE num_page = ?');
      	$req3->execute(array($filePath3, $NumberOfLigne));
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
// FIN DU FICHIER MATÉRIEL

// FICHIER CONTROLE TECHNIQUE
  $filePath4 = 'none';
  if (array_key_exists('liste_controle_technique', $_FILES)) {
  	$taille4 = filesize($_FILES['liste_controle_technique']['tmp_name']);
  	$extension4 = strtolower(strrchr($_FILES['liste_controle_technique']['name'], '.'));

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
  		$fichier4 = basename($_FILES['liste_controle_technique']['name']);
  		$fichier4 = strtr($fichier4,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
  		$fichier4 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier4);
  		$filePath4 = 'upload/photos_controle_technique/' . $paGe4 . '/' . $fichier4;
  		$relativeFilePath4 = '../' .$filePath4;
  		mkdir(dirname($relativeFilePath4), 0777, true);

  		if(move_uploaded_file($_FILES['liste_controle_technique']['tmp_name'], $relativeFilePath4)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
  		{
  			echo 'Upload effectué avec succès n4!<br>';
        $req4 = $bdd->prepare('UPDATE ventes_encheres SET link_controle_technique = ? WHERE num_page = ?');
      	$req4->execute(array($filePath4, $NumberOfLigne));
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
// FIN DU CONTROLE TECHNIQUE

// DÉBUT REGLEMENT
$filePath5 = 'none';
if (array_key_exists('reglement_jeu_tirage', $_FILES)) {
  $taille5 = filesize($_FILES['reglement_jeu_tirage']['tmp_name']);
  $extension5 = strtolower(strrchr($_FILES['reglement_jeu_tirage']['name'], '.'));

  //Début des vérifications de sécurité...
  if(!in_array($extension5, $extensions)) //Si l'extension n'est pas dans le tableau
  {
    $erreur5 = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...n5';
  }
  if($taille5>$taille_maxi)
  {
    $erreur5 = 'Le fichier est trop gros... n5';
  }
  $paGe5 = rand();
  if(!isset($erreur5)) //S'il n'y a pas d'erreur, on upload
  {
    $fichier5 = basename($_FILES['reglement_jeu_tirage']['name']);
    $fichier5 = strtr($fichier5,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier5 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier5);
    $filePath5 = 'upload/photos_controle_technique/' . $paGe5 . '/' . $fichier5;
    $relativeFilePath5 = '../' .$filePath5;
    mkdir(dirname($relativeFilePath5), 0777, true);

    if(move_uploaded_file($_FILES['reglement_jeu_tirage']['tmp_name'], $relativeFilePath5)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
      echo 'Upload effectué avec succès n5!<br>';
      $req4 = $bdd->prepare('UPDATE ventes_encheres SET reglement_jeu_tirage = ? WHERE num_page = ?');
      $req4->execute(array($filePath5, $NumberOfLigne));
    }
    else //Sinon (la fonction renvoie FALSE).
    {
      echo 'Echec de l\'upload n5 !';
    }
  }
  else
  {
    echo 'Echec de l\'upload du fichier n5 !';
    echo $erreur5;
  }
}

//FIN REGLEMENT

  $title=$_POST['title'];
	$time=$_POST['heure'];
	$date=$_POST['date'];
	$lieu=$_POST['lieu'];

	$resultat = $bdd->prepare('UPDATE ventes_encheres SET title = ?, heure = ?, date_bd = ?, lieu = ? WHERE num_page = ?');
	$resultat->execute(array($title, $time, $date, $lieu, $NumberOfLigne));

	if($resultat->errorCode() == 0) {
		echo "<h1>La modification a fonctionné</h1>";
		header("refresh:2;url=index.php");
	} else {
		$errors = $resultat->errorInfo();
		echo($errors[2]);
	}
}
else {
	echo "Validate doesn't works.";
}
?>
