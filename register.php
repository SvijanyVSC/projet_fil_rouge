<?php
//demarrage de la session
session_start();
//imports
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/admins.php";
//Appel de la méthode pour ajouter un compte
$message = register();

function register(): string
{
    //Test si le formulaire est submit
    if (isset($_POST["submit"])) {
        //Test si les champs sont tous remplis
        if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            //Nettoyage
            $firstname = sanitize($_POST["firstname"]);
            $lastname = sanitize($_POST["lastname"]);
            $email = sanitize($_POST["email"]);
            $password = sanitize($_POST["password"]);
            //test si le compte n'existe pas
            if (!isAdminExistByEmail($email)) {
                //hash du password
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $admin = [];
                $admin["firstname"] = $firstname;
                $admin["lastname"] = $lastname;
                $admin["email"] = $email;
                $admin["password"] = $hash;
                saveAdmin($admin);
                return "Le compte " . $email . " a été ajouté en BDD";
            } else {
                return "Le compte existe déjà";
            }
        } else {
            return "Veuillez remplir tous les champs de formulaire";
        }
    }
    return "";
}

?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>s'inscrire</title>
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
                <h2>🧪 S'inscrire</h2>
                <p class="error"><?= $message ?? "" ?></p>
                <input type="text" name="firstname" placeholder="saisir le prénom" class="form-input" required>
                <input type="text" name="lastname" placeholder="saisir le nom" class="form-input" required>
                <input type="email" name="email" placeholder="saisir le mail" class="form-input" required>
                <input type="password" name="password" placeholder="saisir le password" class="form-input" required>
                <input type="submit" value="Inscription" name="submit" class="button">
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







    