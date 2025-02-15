<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen">
</head>
<body>
    <img src="image/icone.jpg" id="icone" alt="icone de la galerie" width="160" height="120">
     <h2 ><marquee behavior="alternate" id="fil"> Si vous voulez acceder à notre galerie veuillez entrer vos identifiants!!</marquee></h2>
	<div id="container"></div>
	 <!-- zone de connexion -->   
            <form action="verification.php" method="POST">
                <fieldset>
                	<legend id="cen">Bienvenue sur notre page de connexion</legend>
                
                
                <input type="text" placeholder="Nom d'utilisateur" name="username" required>
                <br>
                
                <input type="password" placeholder="Mot de passe" name="password" required>
                <br>
                <input type="submit" id='submit' value='Se connecter' >
                <br>
                <a href="inscription.php" id="Mos"><center>Créer un nouveau compte ici!!!</center></a>

                </fieldset>
                <?php

                // si le nom d'utilisateur ou le mdp sont érronés

                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p ><center style='color:red'>Utilisateur ou mot de passe incorrect!!!</center></p>";
                }
                ?>
            </form>

</body>
</html>