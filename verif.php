<?php
	include 'conBD.php';

	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['mdp2']))
	{
		sleep(1);
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$email = htmlspecialchars($_POST['email']);
		$mdp = htmlspecialchars($_POST['mdp']);
		$mdp2 = htmlspecialchars($_POST['mdp2']);

		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$mdp = sha1(md5("sel1") + $mdp + md5("sel2"));
			$mdp2 = sha1(md5("sel1") + $mdp2 + md5("sel2"));
			if(strcmp($mdp,$mdp2) == 0)
			{
               $res = pg_prepare($vConn,"insert","INSERT INTO UTILISATEUR(nom,prenom,email,mdp) VALUES($1, $2, $3, $4)");
               $res = pg_execute($vConn,"insert",array($nom,$prenom,$email,$mdp));
			}
			else
			{
				echo "les mots de passes saisis sont differents\n";
			}
		}
		else
		{
			echo "l'adresse mail saisie n'est pas valide \n";
		}
	}
	pg_close($vConn);
?>