<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Navbar</title>
	</head>
	<body>

				<!--HEADER-->
				<header>
					<nav>
						<section class="logo_banner">
							<a href="index.php" data-tooltip="Page Accueil">
								<img src="./public/images/logo.png" class="logo" alt="logo pour le site Escape Game Laboratory Test">
							</a>
							<div class="titles_banner">
								<h1>ESCAPE GAME</h1>
								<h2 class="h2_title_banner">LABORATORY TEST</h2>
							</div>
						</section>

						<!-- Menu connecté (Admins)-->
						<?php if (isset($_SESSION["connected"])) :?>
						<ul class="php-menu">
							<li>
								<strong><a href="index.php" data-tooltip="Page Accueil" class="home ancre-decoration">Accueil</a></strong>
							</li>
							<li><a href="showAllArticle.php" data-tooltip="Profil" class="home ancre-decoration">Articles</a></li>
							<li><a href="adminEscapeGame.php" data-tooltip="Profil" class="home ancre-decoration">Escape Games</a></li>
							<li><a href="deconnexion.php" data-tooltip="Déconnexion" class="home ancre-decoration">Déconnexion</a></li>
							<?php else : ?>
							</ul>
							<!-- Menu déconnecté -->
							<ul class="php-menu">
								<li>
									<strong><a href="index.php" data-tooltip="Page Accueil" class="home ancre-decoration">Accueil</a></strong>
								</li>
								<li><a href="blog.php" class="ancre-decoration">Blog</a></li>
								<li><a href="play.php" class="ancre-decoration">Jouer</a></li>
								<li><a href="contact.php" class="ancre-decoration nav_contact">Contact</a></li>
								<li><a href="connexion.php" data-tooltip="Se connecter" class="ancre-decoration nav_connexion">Connexion</a></li>
							
								<?php endif ?>
							</ul>
						</nav>
					</header>
				</body>
			</html>