<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./public/style.css">
</head>

<body>
  <!--HEADER-->
  <header class="container-fluid">
    <?php
            //import du menu
            include "./navbar.php"; 
        ?>
  </header>

  <!--MAIN-->

  <main>
    <h3>À vous de jouer !</h3>

<section id="room">
  <div class="room-items">
    <img src="./public/images/door.png" id="closed_door" class="object" alt="Porte">
    <img src="./public/images/padlock.png" id="padlock" class="object"  alt="Cadenas">
    <img src="./public/images/lock.png" id="lock" class="object"  alt="Serrure">
    <img src="./public/images/key.png" id="key" class="object"  alt="Clé">
    <img src="./public/images/letter.png" id="letter" class="object"  alt="Lettre">
  </div>

  <div id="message-card" class="object"></div>

    
      <audio id="bg-music" autoplay loop>
        <source src="./public/sound/alice-in-dark-wonderland-123894.mp3" type="audio/mp3">
      </audio>

      <button id="sound-btn">
        <img id="sound-icon" class="object" src="./public/images/sound.png" alt="Son activé">
      </button>
      
  <button id="escape" class="object" >Passer la porte ! 🏆</button>
</section>
  </main>


  <!--FOOTER-->
  <footer>
    <?php
            //import du menu
            include "./footer.php"; 
        ?>
  </footer>

  <script src="./public/script.js"></script>
</body>

</html>