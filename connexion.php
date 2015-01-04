<?php
	
if(!isset($engineLoaded))
{
	$needHTML = true;
	require("engine.php");
}

require("include/verifConnexion.php");

if(isset($needHTML))
{
	$titre = "Connexion";
	require("header.php");
}
?>

<form method="POST" action="connexion.php" class="table">
	<label for="email">Email : </label><input type="text" name="email" id="email" value="<?=defaultPost('email')?>"/><br/>
	<label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" value="<?=defaultPost('mdp')?>"/><br/>
	<input type="submit"/>
</form>

<?php
if(isset($needHTML))
{
	require("footer.php");
}
?>