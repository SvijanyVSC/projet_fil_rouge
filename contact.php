<?php

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = isset($_POST['firstname']) ? trim(htmlspecialchars($_POST['firstname'])) : '';
    $lastname = isset($_POST['lastname']) ? trim(htmlspecialchars($_POST['lastname'])) : '';
    $phone = isset($_POST['phone']) ? trim(htmlspecialchars($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
    $messageForm = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';

    require_once "model/forms.php"; // inclure la fonction saveForms()
    
    if ($firstname && $lastname && $phone && $email && $messageForm) {
        $message = "<p>Merci <span>$firstname $lastname</span>, votre message a bien été reçu.</p>
                    <p>Téléphone : <span>$phone</span></p>
                    <p>Email : <span>$email</span></p>
                    <p>Message : <span>$messageForm</span></p>";
    } else {
        $message = "<p>Erreur : veuillez remplir tous les champs obligatoires.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
</head>
<body>
    <header>
        <?php include "./navbar.php"; ?>
    </header>

    <main>
      <section>
        <p>Si tu as des questions à poser ou des remarques à faire… utilise ce formulaire !</p>
        <p>Je suis peut-être loin, mais je lis tout. Toujours.</p>
        <p>— LUMA</p>
      </section>
       
      
        <!-- Affichage du message -->
        <?php if($message) echo "<div class='form-message'>".$message."</div>"; ?>

        <section class="form_section">
        
        <form action="" method="post" class="form">
          <h3>☢️ Contact ☢️</h3>
                  
          </div>
            <div>
            <input type="text" name="firstname" class="form-input"  placeholder="Prénom" required>
            <input type="text" name="lastname" class="form-input"  placeholder="Nom" required>
            </div>

            <div>
            <input type="tel" name="phone" class="form-input"  placeholder="Téléphone" required>
            <input type="email" name="email" class="form-input"  placeholder="Email" required>
            </div>
            
            <textarea name="message" class="textarea"  placeholder="Votre message" required></textarea>
            <input type="submit" class="button" value="Envoyer">
        </form>
        </section>
    </main>

    <footer>
        <?php include "./footer.php"; ?>
    </footer>
</body>
</html>

