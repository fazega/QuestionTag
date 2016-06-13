<?php
	session_start();
	if(count($_SESSION)==0 OR $_SESSION['pseudo']==null)
	{
		die("error;connectionError");
	}
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=questiontag;charset=utf8', 'root', '');
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	if($_POST['request']=='getCity')
	{
		$requestText = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
		$req = $bdd->query($requestText);
		$donnees = $req->fetch();
		if($donnees >= 1) 
		{
			echo $donnees['city'];
		}
		//Sinon, bah on renvoie un fail :p
		else 
		{
			echo 'fail;connectionError';
		}
	}
	if($_POST['request']=='getMail')
	{
		$requestText = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
		$req = $bdd->query($requestText);
		$donnees = $req->fetch();
		if($donnees >= 1) 
		{
			echo $donnees['mail'];
		}
		//Sinon, bah on renvoie un fail :p
		else 
		{
			echo 'fail;connectionError';
		}
	}
	if($_POST['request']=='getUserText')
	{
		$requestText = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
		$req = $bdd->query($requestText);
		$donnees = $req->fetch();
		if($donnees >= 1) 
		{
			echo $donnees['aboutUser_freeText'];
		}
		//Sinon, bah on renvoie un fail :p
		else 
		{
			echo 'fail;connectionError';
		}
	}
	if($_POST['request']=='modifyAccount')
	{
		$mail = $_POST['mail'];
		$id = $_SESSION['id'];
		$city = $_POST['city'];
		$userText = $_POST['userText'];
		//Ajouter ici la partie sécu en échappant ce qu'il faut dans les données POST.
		$req = $bdd->prepare('UPDATE users SET mail = :mail, city = :city, aboutUser_freeText = :userText WHERE id = :id');
		$req->execute(array(
			'mail' => $mail,
			'city' => $city,
			'userText' => $userText,
			'id' => $id
			));
	}
	if($_POST['request']=='changePwd')
	{
		$oldPassword = $_POST['oldPassword'];
		$id = $_SESSION['id'];
		$newPassword = $_POST['newPassword'];
		$repeatPassword = $_POST['repeatPassword'];
		//Ajouter ici la partie sécu en échappant ce qu'il faut dans les données POST.
		$req = $bdd->query('SELECT password FROM users WHERE id = '.$id.';');
		$data = $req->fetch();
		$password = $data['password'];
		if(($newPassword===$repeatPassword) && ($oldPassword===$password))
		{
			$req = $bdd->prepare('UPDATE users SET password = :newPassword WHERE id = :id');
			$req->execute(array(
				'newPassword' => $newPassword,
				'id' => $id
				));
			echo('success');
		} else {
			if($newPassword!=$repeatPassword)
			{
				die('passwordsNotIdentical');
			}
			if($oldPassword!=$password)
			{
				die('wrongPassword');
			}
			die('genericPasswordError');
		}
	}
?>