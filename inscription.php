<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css" media="screen">
	<title>insription</title>
</head>
<body>
	<form action="inscription.php" method="POST">
		<fieldset>
  <table id="title">
    <tr>
      <td>Nom:</td>
        <td><input type="text" name="nom" /></td>
      </tr>
    <tr>
      <td>Prénom:</td>
        <td><input type="text" name="prenom" /></td>
      </tr>
    <tr>
      <td>Nom d'utilisateur:</td>
        <td><input type="text" name="username" /></td>
      </tr>
      <tr>
      <td>Adresse électronique:</td>
        <td><input type="email" name="email" /></td>
      </tr>
      
    <tr>
      <td>Mot de passe:</td>
        <td><input type="password" name="password" /></td>
      </tr>
      <tr>
      <td>Confirmez mot de passe:</td>
        <td><input type="password" name="Confirmez" /></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
        <td><input type="submit" name="submit" value="S'inscrire" /></td>
      </tr>
  </table>
</div>
</fieldset>
</form>

<?php

if (isset($_POST['submit']))
    {   

    $db_username = 'root'; // user de la base de donnée
    $db_password = ''; // mot de passe de la base de donnée
    $db_name     = 'testmysql'; // nom de la base de donnée
    $db_host     = 'localhost'; // serveur de la base de donnée

    // Connexion à la base de donnée

    
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('impossible de se connecter à la base de donnée ');

    $nom =htmlspecialchars(trim($_POST['nom']));
    $prenom =htmlspecialchars(trim($_POST['prenom']));
    $email =htmlspecialchars(trim($_POST['email']));
    $username =htmlspecialchars(trim($_POST['username']));
    $password=htmlspecialchars(trim($_POST['password']));
    $Confirmez=htmlspecialchars(trim($_POST['Confirmez']));


if ($nom && $prenom && $email && $username && $password && $Confirmez) 
{
  // code...

  if ($password==$Confirmez) 
  {
    // code...

  $insertion = mysqli_query($db,"insert into client(nom,prenom,email,username,password) values('$nom','$prenom','$email','$username','$password')");

    die( "<a  id='lien' href='index.php'><h3> Inscription terminée, Cliquez ici !!</h3></a>");
  } 
  else
    { echo "<p >les deux password doivent être identique</p>";}
}
else
{
  echo "<p >Veuillez saisir tous les champs</p>";
}
   
    }
    
?>


</body>
</html>
