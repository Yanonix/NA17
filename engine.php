<?php

if(!isset($engineLoaded)) // Kill multiple inclusion
{

$engineLoaded = true;

// Chargement de la configuration du serveur
require("config.php");

// Session PHP
session_start();

// Connexion à la BDD
$vConn = pg_connect("host=$bddHost port=$bddPort dbname=$bddDbname user=$bddUser password=$bddPassword");
if(!$vConn)
{
	echo "Erreur de connexion à la base de donnée $bddDbname\n";
	exit;
}

/*=======================================================================================================================================*/
/* MESSAGES DE SERVICE */
/*=======================================================================================================================================*/

class MessagesService {
	
	const OK = 0;
	const ERREUR = 1;
	const INFO = 2;

	/**
	 * Affiche la liste des messages en mémoire
	 */
	static function afficher() {
		if(isset($_SESSION['MessagesService']))
		{
			while(count($_SESSION['MessagesService']))
			{
				$message=array_shift($_SESSION['MessagesService']);
				echo '<div class="message_'.$message['type'].'">'.$message['message'].'</div>';
			}
		}
	}
	
	/**
	 * Ajoute un message
	 */
	static function ajouter($type, $message) {
		$_SESSION['MessagesService'][]=array('type' => $type, 'message' => $message);
	}
}


function defaultPost($name)
{
	if(isset($_POST[$name]))
		return $_POST[$name];
	else
		return '';
}
function defaultPostChecked($name)
{
	if(isset($_POST['name']) && $_POST['name'])
		return ' checked="checked"';
	else
		return '';
}

function redirection($url)
{
	header("location: ".$url);
	exit();
}

}
?>