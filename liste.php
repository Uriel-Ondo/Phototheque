<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css" media="screen">
	<title>Stock d'images</title>
</head>
<header>
	<img src="image/ban2.jpg" id="im" alt="bannière d'acceuil présentant des personnes debouts" width="1480" height="400">
		<a href="acceuil.php"><h3>Retour à la page d'acceuil</h3> </a>
		<h1 id="fil"><marquee behavior="alternate"> Bienvenue dans la galerie photos, cliquez sur un nom pour afficher une photo !! </marquee></h1>
	</header>
<body>
	
	<?php
		include ("connexion.php");
		$req="SELECT img_nom, id_img ".
		"FROM image ORDER BY img_nom";

		$ret = mysqli_query($cnx,$req) or die(mysql_error());
		while ($col = mysqli_fetch_row($ret)){
			echo"<h3 id='cont'><a href=\"aperçu.php?id=".$col[1]."\">".$col[0]."</a></h3><br/>";

		}
	?>
</body>
</html>