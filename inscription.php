<?php
	
if(!isset($engineLoaded))
{
	$needHTML = true;
	require("engine.php");
}

require("include/verifInscription.php");

if(isset($needHTML))
{
	$titre = "Inscription";
	require("header.php");
}
?>

<form method="POST" action="inscription.php">
	<form method="POST" action="verif.php">
		<label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?=defaultPost('nom')?>"/><br/>
		<label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="<?=defaultPost('prenom')?>"/><br/>
		<label for="email">Email : </label><input type="text" name="email" id="email" value="<?=defaultPost('email')?>"/><br/>
		<label for="mdp">Mot de passe: </label><input type="password" name="mdp" id="mdp" value="<?=defaultPost('mdp')?>"/><br/>
		<label for="mdp2">Repetez : </label><input type="password" name="mdp2" id="mdp2" value="<?=defaultPost('mdp2')?>"/><br/>
		<label for="auteur">Auteur :</label><input type="checkbox" name="auteur" id="auteur" <?=defaultPostChecked('auteur')?>/>Oui<br/>
		<input type="submit"/>
		</form>
</form>

<?php
if(isset($needHTML))
{
	require("footer.php");
}
?>