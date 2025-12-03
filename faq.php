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
    <h2>❓ Foire Aux Questions</h2>
<section class="faq_section">

  <div class="faq_item">
    <h3>Quel niveau de difficulté ?</h3>
    <p>Le jeu est accessible aux novices comme aux joueurs intermédiaires. Les indices sont fournis par messages lors de clics sur certains éléments.</p>
    <hr>
    </div>

    <div class="faq_item">
    <h3>Qu'est-ce que l'Escape Game Laboratory Test ?</h3>
    <p>C'est un escape game en ligne où tu dois résoudre une énigme et trouver des objets pour ouvrir une porte close. Conçu pour les jeunes adultes curieux et amateurs de défis ludiques.</p>
    <hr>
    </div>

    <div class="faq_item">
    <h3>Que dois-je accomplir ?</h3>
    <p>Ton objectif est simple : résoudre l'énigme, trouver les objets cachés et ouvrir la porte pour réussir le jeu.</p>
    <hr>
    </div>
   
</section>

<section class="contact_direction">
 <a href="contact.php">Plus de Questions ? Accéder au formulaire</a>
 </section>

  </main>

  <footer>
    <?php
            //import du menu
            include "./footer.php"; 
        ?>
  </footer>

</body>