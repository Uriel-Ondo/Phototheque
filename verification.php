<?php
//ouverture de la Session 
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root'; // user de la base de donnée
    $db_password = ''; // mot de passe de la base de donnée
    $db_name     = 'testmysql'; // nom de la base de donnée
    $db_host     = 'localhost'; // serveur de la base de donnée

    // Connexion à la base de donnée
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('impossible de se connecter à la base de donnée ');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
      // requete de verification du username & du password dans la Table client de la BDD
        $requete = "SELECT count(*) FROM client where  username = '".$username."' and password = '".$password."' "; 

      // execution de la requete dans la BDD
        $exec_requete = mysqli_query($db,$requete);

      // stockages des lignes user & passwd correspondante à la requete dans la variable
        $reponse      = mysqli_fetch_array($exec_requete);

        //récupération des données des lignes username & password de la base de données 
        $count = $reponse['count(*)'];

        // Si nom d'utilisateur et mot de passe correctes
        // Allez à la page acceuil.php
        if($count!=0) 
        {
           $_SESSION['username'] = $username;
           header('Location: acceuil.php');
        }
        else
        {
         // Sinon utilisateur ou mot de passe incorrect
         // rester sur la même page
           header('Location: index.php?erreur=1'); 
        }
    }
    else
    {  
      // Sinon utilisateur ou mot de passe vide
      //rester sur la même page
       header('Location: index.php?erreur=2'); 
    }
}
else
{ 
   // Sinon rester sur la même page
   header('Location: index.php');
}

// fermer la connexion à la base de donnée
mysqli_close($db); 
?>







