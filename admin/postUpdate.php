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
