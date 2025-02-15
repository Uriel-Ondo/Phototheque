<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css" media="screen">
	<title>acceuil</title>
    
</head>
<body>
    
    <img src="image/baner.jpg" id="baner" alt="bannière d'acceuil présentant des personnes debouts" width="1480" height="400">
<!-- Creation d'un lien pour la déconnection de l'utilisateur-->
<a  href='acceuil.php?deconnexion=true'><span><h2>Déconnexion</h2></span></a>
	


<!-- tester si l'utilisateur est connecté -->
 <?php

 //Ouverture de la session
 session_start();

 // Si l'utilisateur clique sur deconnexion
  if(isset($_GET['deconnexion']))
  { 
  	// si la condition est vérifiée
    if($_GET['deconnexion']==true)
      {  
      	// Fermer toutes les sessions
         session_unset();

         // et ramener l'utilisateur à la page index.php
         header("location:index.php");
      }
  }

  // Sinon Si la session est bien ouverte 
   else if($_SESSION['username'] !== "")
   {
      //Stocker le username dans la veriable $utilisateur
      $utilisateur = $_SESSION['username'];

      // Et afficher un message de bienvenue
     echo "<br><h1 id='fil'><center>Heureux de vous voir $utilisateur, vous êtes bien connecté!!!</center></h1>";
    }
  ?>
     <?php
      if(isset($_POST['submit'])){
     
    $db_username = 'root'; // user de la base de donnée
    $db_password = ''; // mot de passe de la base de donnée
    $db_name     = 'testmysql'; // nom de la base de donnée
    $db_host     = 'localhost'; // serveur de la base de donnée
      // Créer une connexion

      $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('impossible de se connecter à la base de donnée ');
      
      // Vérifier la connexion
      if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
      }
      echo "Connected successfully";
      }
       ?> 

      <?php
        include("transfert.php");
        if (isset($_FILES['fic'])){
            transfert();
        }
    ?>

    
        <h2 id="fil"><marquee behavior="alternate"> Bienvenue dans la galerie photos de la RT2</marquee></h2>
    <br>
    <h3 id="top"><center>Envoi d'une image</center></h3>
    <form id="acces" enctype="multipart/form-data" action="#" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="250000"/>
        <input type="file" name="fic" size="50"/>
        <input type="submit" name="envoyer"/>
    </form><br>
    <a href="liste.php"><h2 id="acc">Cliquez ici pour afficher la galerie </h2></a>

    
      
</body>
</html>