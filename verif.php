<?php
	include 'conBD.php';

	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']))
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];

		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$mdp = sha1(md5("sel1") + $mdp + md5("sel2"));
			$vSql = "INSERT INTO UTILISATEUR (nom,prenom,email,mdp) values ( '$nom','$prenom','$email','$mdp')";
			$vQuery = pg_query($vConn,$vSql);
			if(!$vQuery)
			{
				echo "erreur lors de la requête : \n";
				echo $vSql. "\n";
				exit;
			}
			else
			{
				echo "insertion de l'utilisateur $nom reussie \n";
			}
		}
	}
	pg_close($vConn);
?>
