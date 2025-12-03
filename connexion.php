<?php
//demarrage de la session
session_start();
//imports
include "utils/tools.php";
include "env.php";
include "utils/bdd.php";
include "model/admins.php";
$message = connexion();


function connexion() {
    //Test si le formulaire est submit
    if (isset($_POST["submit"])) {
        //Test si les champs sont tous remplis
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            //Nettoyage
            $email = sanitize($_POST["email"]);
            $password = sanitize($_POST["password"]);
            //test si le compte existe
            if (isAdminExistByEmail($email)) {
                //récupération du compte
                $admin = findAdminByEmail($email);
                //Test si le password est valide
                if (password_verify($password, $admin["password"])) {
                    //Création de la session
                    $_SESSION["Id_Admins"] = $admin["Id_Admins"];
                    $_SESSION["connected"] = true;
                    //redirection vers la page d'accueil connecté
                    header('Location: index.php');
                } 
            }
            return "les informations de connexion sont incorrectes";
        } else {
            return "Veuillez remplir tous les champs de formulaire";
        }
    }
    return "";
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <title>Connexion</title>
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
            <form action="" method="post">
                <h2 class="lato-bold">🥼 Se connecter</h2>
                    <input type="email" name="email" placeholder="Votre email" class="form-input" required>
                    <input type="password" name="password" placeholder="Votre mot de passe" class="form-input" required>
                    <input type="submit" value="Connexion" name="submit" class="button">
                        <p class="error"><?=$message??""?></p>
                        <a href="register.php">Pas encore inscrit ?</a>
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