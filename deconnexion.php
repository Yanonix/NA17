<?php
	
if(!isset($engineLoaded))
{
	require("engine.php");
}

session_destroy();
session_start();
MessagesService::ajouter(MessagesService::OK, "Déconnecté");
redirection("index.php");
?>