<?php 
	function transfert(){
		$ret=false;
		$img_blob='';
		$img_nom='';
		$img_type='';
		$taille_max=250000;
		$img_taille=0;
		$ret= is_uploaded_file($_FILES['fic']['tmp_name']);
		if (!$ret) {
			echo "probleme de transfert";
			return false;
		}
		else{
			$img_taille=$_FILES['fic']['size'];
			if ($img_taille>$taille_max) {

				echo" trop gros";
				return false;
			}
			$img_type=$_FILES['fic']['type'];
			$img_nom=$_FILES['fic']['name'];

			include('connexion.php');

			$img_blob = file_get_contents($_FILES['fic']['tmp_name']);


			$req = "insert into image("."img_nom, img_taille, img_type, img_blob".") 
			values ("."'".$img_nom."',".
			"'".$img_taille."',".
			"'".$img_type."',".
			"'".addslashes($img_blob)."')";

			$ret = mysqli_query($cnx,$req) or die(mysql_error());
			return true;
		}

	}


 ?>