<?php
	$vHost = "localhost";
	$vPort = "5432";
	$vDbname = "postgres";
	$vUser = "gregory";
	$vPassword = "2nd1094600";
	$vConn = pg_connect("host=$vHost port=$vPort dbname=$vDbname user=$vUser password=$vPassword");
	if(!$vConn)
	{
		echo "erreur de connexion à la base de donnée $vDbname\n";
		exit;
	}
?>