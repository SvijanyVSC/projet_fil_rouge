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
$message = modifyArticle();

//Méthode pour ajouter une article en BDD
function modifyArticle(): string
{
    //Test si l'article est submit
    if (isset($_POST["submit"])) {
        //test si les champs sont remplis
        if (
            !empty($_POST["Id_Articles"]) && !empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["update_at"])
        ) {
            //nettoyage des informations de la article (article)
            $idArticle = (int) sanitize($_POST["Id_Articles"]);
            $title = sanitize($_POST["title"]);
            $description = sanitize($_POST["description"]);
            $update_at = sanitize($_POST["update_at"]);
            //Tableau de la article
            $idArticle["Id_Articles"] = $idArticle;
            $article["title"] = $title;
            $article["description"] = $description;
            $article["update_at"] = $update_at;
            //appel de la méthode pour ajouter une article
            updateArticle($article);
            return "L'article a été amodifié en BDD";
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
        <h3>✏️ Modifier un article du blog</h3>

        <p class="error"><?= $message ?? "" ?></p>
        <input type="number" name="Id_Articles" placeholder="ID de l'article à modifier" class="lato-bold form-input" required>
        <input type="text" name="title" placeholder="Nouveau titre" class="lato-bold form-input">
        <textarea name="description" placeholder="Nouvelle description" class="lato-bold form-input"></textarea>
        <label for="update_at">Nouvelle date de publication</label>
        <input type="date" name="update_at" class="lato-bold form-input">

        <input type="submit" value="Modifier" class="button" name="submit">
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