<?php
	/*if(!empty($_POST)) {
		$pseudo = $_POST['pseudo'];
		$password = $_POST['password'];
		
		//Ouverture de la base
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=questiontag;charset=utf8', 'root', '');
		}
		catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
		}
		
		$req = $bdd->query("SELECT * FROM users WHERE pseudo='$pseudo'");
		$donnees = $req->fetch();
		if($donnees >= 1) {
			//Le pseudo existe (et est unique d'apres les modalités de l'inscription)
			
			//Si le password match, on modifie les valeurs et on renvoie un succès
			if($donnees['password'] == $password) {
				echo 'success';
			}
			
			//Sinon, bah on renvoie un fail :p
			else {
				echo 'fail; password incorrect';
			}
		}
		else {
			//Le pseudo n'existe pas, on renvoie un fail
			echo 'fail; pseudo incorrect';
		}
	}*/
	echo 'success';

?>