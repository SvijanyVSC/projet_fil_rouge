<?php
//demarrage la session
session_start();
//imports
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/articles.php";
//test si l'administrateur n'est pas connecté
if (!isset($_SESSION["connected"])) {
    header("Location: index.php");
}

$articles = findAllArticle();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" description="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Liste des articles</title>
</head>

<body>
    <header class="container-fluid">
        <?php
            //import du menu
            include "./navbar.php"; 
        ?>
    </header>
    
    <main>

                <section>
           <div class="admin_article_form">
            <h2>🗂️ Liste des articles</h2>

        <table class="admin_form">
            <thead>
                <tr>
                <th class="form_table">Numéro identifiant</th>
                <th class="form_table">Titre</th>
                <th class="form_table">Description</th>
                <th class="form_table">Date de création</th>
                </tr>
            </thead>
            <!-- Boucler sur le tableau de articles -->
             <tbody class="admin_article">
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td class="form_table">
                    <?= $article["Id_Articles"] ?> </td>
                    <td class="form_table">
                        <?= $article["title"] ?> </td>
                    <td class="form_table">
                        <?= $article["description"] ?>
                    </td>
                    <td class="form_table">
                        <?= $article["update_at"] ?>
                    </td>
                </tr>
            
            <?php endforeach ?>
            </tbody>
        </table>
        <div class="buttons_admin">
            <a href="addArticle.php" class="button">Nouvel article</a>
            <a href="modifyArticle.php" class="button">Éditer</a>
            <a href="deleteArticle.php" class="button">Retirer</a>
        </div>

        </div>
        </section>
    </main>

 <footer>
        <?php include "./footer.php"; ?>
    </footer>
</body>

</html>