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
<section class="section_follow">
    <div>
        <p for="text">Instagram</p>
        <img src="./public/images/instagram.png" alt="Logo Instagram" class="social_media">
    </div>
     <div>
        <p for="text">Youtube</p>
        <img src="./public/images/youtube.png" alt="Logo Youtube" class="social_media">
    </div>
      <div>
        <p for="text">Tiktok</p>
        <img src="./public/images/tiktok.png" alt="Logo Tiktok" class="social_media">
    </div>
    
</section>


  </main>

  <footer>
    <?php
            //import du menu
            include "./footer.php"; 
        ?>
  </footer>

</body>