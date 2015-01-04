<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?=isset($titre)?$titre.' - ':''?>WCMS - NA17</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<h1>NA17 | WCMS</h1>

	<nav>
		<ul>
			<?php if(!isset($_SESSION['id']))
			{
				?>
				<li><a href="connexion.php">Se connecter</a></li>
				<li><a href="inscription.php">S'inscrire</a></li>
				<?php
			} else {
				?>
				<li><a href="deconnexion.php">Se déconnecter</a></li>
				<?php
			}
			?>
		</ul>
	</nav>

	<h2><?=isset($titre)?$titre:''?></h2>
	
	<?php
		MessagesService::afficher();
	?>
