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

  <main>
<section class="admin_escape_game">
    <h3>En cours de construction...</h3>
    <img src="./public/images/Luma_Surprised.png" alt="Luma suprise" class="suprised_Luma">
</section>


  </main>

  <footer>
    <?php
            //import du menu
            include "./footer.php"; 
        ?>
  </footer>

</body>
