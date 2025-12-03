<?php
session_start();
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/articles.php";

if (!isset($_SESSION["connected"])) {
    header("Location: index.php");
    exit;
}

$message = "";

if (isset($_POST["submit"]) && !empty($_POST["Id_Articles"])) {
    $idArticle = (int) $_POST["Id_Articles"]; 
    try {
        deleteArticle($idArticle);
        $message = "L'article a été supprimé de la BDD";
    } catch (Exception $e) {
        $message = "Erreur lors de la suppression : " . $e->getMessage();
    }
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
            <h3>📃 Retirer un article au blog</h3>
            <p class="error"><?= $message ?? "" ?></p>
            <input type="number" name="Id_Articles" placeholder="Saisir l'article à supprimer" class="lato-bold form-input" required>
            <input type="submit" value="Supprimer" class="button" name="submit">
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