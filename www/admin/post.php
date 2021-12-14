<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

require '../connex.php';
if(isset($_POST['envoyer'])){
	$mainNumber = rand();


//Photos
$filesNamesUploaded = array();
	 // File upload configuration
	 $targetDir = "../uploads/";
	 $allowTypes = array('jpg','png','jpeg','gif');

	 $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	 $fileNames = array_filter($_FILES['files']['name']);
	 if(!empty($fileNames)){
			 foreach($_FILES['files']['name'] as $key=>$val){
					 // File upload path
					 $fileName = basename($_FILES['files']['name'][$key]);

					 //Save names in array
					 array_push($filesNamesUploaded, $fileName);

					 $targetFilePath = $targetDir . $fileName;

					 // Check whether file type is valid
					 $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
					 if(in_array($fileType, $allowTypes)){
							 // Upload file to server
							 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
									 // Image db insert sql
									 $insertValuesSQL .= "(".$mainNumber.", '".$fileName."', NOW()),";
							 }else{
									 $errorUpload .= $_FILES['files']['name'][$key].' | ';
							 }
					 }else{
							 $errorUploadType .= $_FILES['files']['name'][$key].' | ';
					 }
			 }

			 if(!empty($insertValuesSQL)){
					 $insertValuesSQL = trim($insertValuesSQL, ',');
					 // Insert image file name into database
					 $insert = $bdd->query("INSERT INTO images (num_page, file_name, uploaded_on) VALUES $insertValuesSQL");
					 if($insert){
							 $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):'';
							 $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):'';
							 $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
							 $statusMsg = "Files are uploaded successfully.".$errorMsg;
					 }else{
							 $statusMsg = "Sorry, there was an error uploading your file.";
					 }
			 }
	 }else{
			 //$statusMsg = 'Please select a file to upload.';
	 }

	 // Display status message
	 echo $statusMsg;
//FIN PHOTOS



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
				//echo 'Echec de l\'upload n1 !';
			}
		}
		else
		{
			//echo 'Echec de l\'upload du fichier n1!';
			//echo $erreur1;
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
				//echo 'Echec de l\'upload n2 !';
			}
		}
		else
		{
			//echo 'Echec de l\'upload du fichier n2!';
			//echo $erreur2;
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
				//echo 'Echec de l\'upload n3 !';
			}
		}
		else
		{
			//echo 'Echec de l\'upload du fichier n3 !';
			//echo $erreur3;
		}
	}
	// Quatrieme fichier
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
				//echo 'Echec de l\'upload n4 !';
			}
		}
		else
		{
			//echo 'Echec de l\'upload du fichier n4 !';
			//echo $erreur4;
		}
	}
	// Cinquième fichier
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
			}
			else //Sinon (la fonction renvoie FALSE).
			{
				//echo 'Echec de l\'upload n5 !';
			}
		}
		else
		{
			//echo 'Echec de l\'upload du fichier n5 !';
			//echo $erreur5;
		}
	}

	$choice = $_POST['choice'];
	$title=$_POST['title_vente'];

	$time=$_POST['time_vente'];
	$date=$_POST['date_vente'];
	$lieu=$_POST['lieu_vente'];

	if ($choice == 'jeu'){
		$time="/";
		$date = DateTime::createFromFormat('j-M-Y', '31-Dec-2030');
		$date = $date->format('Y-m-d');
		$lieu="/";
	}else{
		$time=$_POST['time_vente'];
		$date=$_POST['date_vente'];
		$lieu=$_POST['lieu_vente'];
	}

	$resultat = $bdd->prepare('INSERT INTO `ventes_encheres`(`num_page`,`choice`,`title`, `heure`, `date_bd`, `lieu`, `link_media`, `link_cartesGrises`, `link_materiel`, `link_controle_technique`, `reglement_jeu_tirage`) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
	$resultat->execute(array($mainNumber, $choice, $title, $time, $date, $lieu, $filePath1, $filePath2, $filePath3, $filePath4, $filePath5));

	if($resultat->errorCode() == 0) {
		header("refresh:3;url=index.php");
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
