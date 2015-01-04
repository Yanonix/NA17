<?php

	if(isset($_POST['email']) && isset($_POST['mdp']))
	{
		sleep(1);
		$email = htmlspecialchars($_POST['email']);
		$mdp = htmlspecialchars($_POST['mdp']);

		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$mdp = sha1($mdp);
			$res = pg_prepare($vConn,"connexion","SELECT id_utilisateur AS id, nom, prenom, email, mdp
			                    FROM UTILISATEUR WHERE email=$1 AND mdp=$2");
			$res = pg_execute($vConn,"connexion",array($email, $mdp));
			$nb = pg_num_rows($res);

			if($nb == 1)
			{
				$data = pg_fetch_object($res);
				$_SESSION['id'] = $data->id;
				$_SESSION['nom'] = $data->nom;
				$_SESSION['prenom'] = $data->prenom;
				$_SESSION['email'] = $data->email;
				$_SESSION['mdp'] = $data->mdp;

				MessagesService::ajouter(MessagesService::OK, "Vous êtes connecté !");
				redirection("index.php");
			}
			else
			{
				MessagesService::ajouter(MessagesService::ERREUR, "Erreur d'autentification !");
			}
		}
		else
		{
			MessagesService::ajouter(MessagesService::ERREUR, "Email invalide !");
		}
	}

?>