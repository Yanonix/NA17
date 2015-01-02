<?php
	function connexion($vHost,$vPort,$vDbname,$vUser,$vPassword)
	{
		$vConn = pg_connect("host=$vHost port=$vPort dbname=$vDbname user=$vUser password=$vPassword");
		if(!$vConn)
		{
			echo "erreur de connexion à la base de donnée $vDbname\n";
			exit;
		}
		return $vConn;
	}
?>