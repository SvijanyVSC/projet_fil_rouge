<?php
// imports nécessaires
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/articles.php";

// récupérer tous les articles publiés
$articles = findAllArticlePublic();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <header>
        <?php
            //import du menu
            include "./navbar.php"; 
        ?>
    </header>
<main>
    <h3>Le Blog</h3>
    <?php if (!empty($articles)): ?>
    <?php foreach ($articles as $article): ?>
        <article class="blog-article">
                
                <h4>📍<?= htmlspecialchars($article["title"]) ?> </h4>
           
            <p><?= nl2br(htmlspecialchars($article["description"])) ?></p>
            <hr>
            <small>Publié le <?= htmlspecialchars($article["update_at"]) ?></small>
            
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun article publié pour le moment.</p>
<?php endif; ?>

</main>
           <footer>
        <?php
            //import du menu
            include "./footer.php"; 
        ?>
    </footer>
</body>
</html>