<?php
	if(!empty($_POST)) {
		//Connexion à la base de données
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=questiontag;charset=utf8', 'root', '');
		}
		catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
		}
		
		//On vérifie que le pseudo est pas déjà pris
		$req = $bdd->prepare("SELECT * FROM users WHERE pseudo = :m_pseudo");
		$req->execute(array('m_pseudo'=>$_POST['pseudo']));
		if($req->fetch() >= 1) {
			echo 'fail;pseudo';
		}
		else {
			session_start();
			$_SESSION['mail'] = $_POST['mail'];
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['password'] = $_POST['password'];

			$req = $bdd->prepare('INSERT INTO users VALUES(null,:m_pseudo,:m_password,:m_mail,CURRENT_TIMESTAMP)');
			$req->execute(array('m_pseudo'=>$_SESSION['pseudo'], 'm_password'=>$_SESSION['password'], 'm_mail'=>$_SESSION['mail']));
			echo 'success';
		}
	}
?>