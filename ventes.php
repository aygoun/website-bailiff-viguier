<!DOCTYPE html>
<html lang="fr">

  <head>
    <title>Maîtres VIGUIER Constance - Huissier de Justice à Embrun (05)</title>
    <?php include 'include/head.html' ?>
  </head>

<?php //Connection avec la BDD.

include 'connex.php';
/* Set locale to France */
setlocale(LC_ALL, 'fr_FR');
$reponse = $bdd->query('SELECT * FROM ventes_encheres ORDER BY date_bd DESC');

?>
  <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Maîtres VIGUIER Constance</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid rounded mx-auto mb-2" src="img/VIGUIER LOGO.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Revenir à la Page d'accueil</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="about">
        <div class="my-auto">

          <h1 class="mb-0">Prochaines Ventes aux enchères : </h1>

          <p class="mb-5" id="fonts_write">

            <?php
            while ($donnees = $reponse->fetch())

            { //debut de la boucle while
            ?>

            <div class="row" style="margin:1em!important;">

              <div class="col-md-12">

                <div class="row">
                  <div class="col-2 strg">
                      <?php echo strftime("%A %e %B %Y", strtotime($donnees['date_bd'])); ?>
                      <br><br>
                      <img src="img/ic_time.svg"/><?php echo strftime("%H:%M", strtotime($donnees['heure'])); ?>
                      <br>
                      <img src="img/ic_location.svg"/><?php echo $donnees['lieu']; ?>
                  </div>
                    <div class="col-10">
                      <div class="col-12 strg" style="padding:0;">
                        <p>Liste du matériel à vendre : <a href="<?php echo $donnees['link_materiel']; ?>">Cliquez ici</a><br /></p>

                        <?php
                        if ($donnees['link_cartesGrises'] != 'none'){
                        ?>
                        <p>En cas de vente de véhicule, visualiser le carte grise : <a href="<?php echo $donnees['link_cartesGrises']; ?>">Cliquez ici</a><br /></p>
                        <?php
                        }
                        else{
                        ?>
                        <p>Aucun véhicule n'est en vente.</p>
                        <?php
                        }
                        ?>

                      </div>

                      <div class="col-md-12 row" style="width:100; height:100;">
                        <img class="img-fluid img_ventes" src="<?php echo $donnees['link_media']?>" style="width:70%!important; height:70%!important;padding:0!important;margin:0!important;"/>
                      </div>
                  </div>

                  <HR align=center size=8 width="100%" style="border: 1px solid rgb(53,68,63);">

              </div>
            </div>
          </div>

            <?php
            }
            ?>

          </p>


        </div>

      </section>

    </div>

<?php

$reponse->closeCursor(); // Termine le traitement de la requête

?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

  <footer>

    <p style="text-align: center; margin: 2em; color: black;">
      Copyright © <a href="http://www.viguier-huissier.com" style="color: black;">viguier-huissier.com</a>
      <br>
      <a href="http://www.armandblin.com/" onclick="window.open(this.href); return false;"><span style="color: grey;">Site Web réalisé par Armand BLIN</span></a>
    </p>

  </footer>

</html>
