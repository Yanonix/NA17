<!--
	Page servant à indiquer à l'utilisateur si la connexion est réussie ou non.
	la mise en page de cette page sera identiques à toutes les autres.
-->
<?php
	session_start();
	#remplacer plus tard par une redirection sur l'accueil.
	header ("Refresh: 5;URL=formulaireConnexion.html");
?>
<html>
	<head>
		<title>verification de connexion</title>
	</head>
	<body>
	<?php
		echo $_SESSION['message'];
		session_unset($_SESSION['message']);
	?>
	</body>
</html>