<?php
//demarrage de la session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <header>
    <?php
            //import du menu
            include "./navbar.php"; 
        ?>
  </header>

  <!--MAIN-->
  <main>

    <!--LA PRÉSENTATION-->

    <section id="container_presentation">

      <h3>L’origine du chaos mène ici.</h3>

      <p>Saurez-vous découvrir ce qui s’y cache ?</p>

      <!--LA TÉLÉVISION-->
      <section class="tv-wrapper">
        <img src="./public/images/tv.png" class="tv-image" alt="TV">
        <video class="tv-video" src="./public/video/trailer.mp4" controls></video>
      </section>

      <!--"Bouton" Jouer-->
      <a href="play.php" class="button main_button">☢️ Entrer dans le Laboratoire ☢️</a>
    </section>

  </main>

  <footer>
    <?php
            //import du menu
            include "./footer.php"; 
        ?>
  </footer>

</body>
