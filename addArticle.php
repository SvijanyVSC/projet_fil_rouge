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

//Appel de la méthode pour ajouter une article
$message = addArticle();

//Méthode pour ajouter une article en BDD
function addArticle(): string
{


    //Test si l'article est submit
    if (isset($_POST["submit"])) {
        //test si les champs sont remplis
        if (
            !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["update_at"])
        ) {

            //nettoyage des informations de la article (article)
            $title = sanitize($_POST["title"]);
            $description = sanitize($_POST["description"]);
            $update_at = sanitize($_POST["update_at"]);
            //Tableau de la article
            $article = [];
            $article["title"] = $title;
            $article["description"] = $description;
            $article["update_at"] = $update_at;
            //appel de la méthode pour ajouter une article
            saveArticle($article);
            return "La article a été ajoutée en BDD";
        } else {
            return "Veuillez remplir tous les champs de l'article";
        }
    }
    return "";
}

?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" description="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Ajouter une article</title>
</head>

<body>
    <header>
    <?php
            //import du menu
            include "./navbar.php"; 
        ?>
  </header>
    <main>

        <section class="form_section">
            
        <form action="" method="post" enctype="multipart/form-data">
            <h3>📃 Ajouter un article au blog</h3>
            <p class="error"><?= $message ?? "" ?></p>
            <input type="text" name="title" placeholder="Saisir le titre" class="lato-bold form-input" required>
            <textarea name="description" placeholder="Saisir le contenu de l'article" class="lato-bold form-input" required></textarea>
            <label for="update_at">Saisir la date de publication de l'article</label>
            <input type="date" name="update_at" class="lato-bold form-input" required>
            <input type="submit" value="Ajouter" class="button" name="submit">
        </form>
        </section>
    </main>

  <footer>
    <?php
            //import du menu
            include "./footer.php"; 
        ?>
  </footer>
</body>

</html>