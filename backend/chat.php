<?php
	session_start();
	if(isset($_SESSION['pseudo'])) {
		if(isset($_POST['message'])) {
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=questiontag;charset=utf8', 'root', '');
			}
			catch (Exception $e){
					die('Erreur : ' . $e->getMessage());
			}
			$req = $bdd->prepare('INSERT INTO chat_messages VALUES(null,:m_id_chat,:m_pseudo,:m_message, "normal",CURRENT_TIMESTAMP)');
			$req->execute(array('m_id_chat' => 1, 'm_pseudo'=>$_SESSION['pseudo'], 'm_message'=>$_POST['message']));
			
			echo '{"status":"success","pseudo":"'.$_SESSION['pseudo'].'","message":"'.$_POST['message'].'"}';
		}
		if(isset($_POST['load']) or isset($_POST['check'])) {
			$id_chat = 0;
			if(isset($_POST['load']))
				$id_chat = $_POST['load'];
			if(isset($_POST['check']))
				$id_chat = $_POST['check'];
			//Connexion à la base de données
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=questiontag;charset=utf8', 'root', '');
			}
			catch (Exception $e){
					die('Erreur : ' . $e->getMessage());
			}
			$req = $bdd->prepare("SELECT * FROM chat_messages WHERE id_chat = :m_id");
			$req->execute(array('m_id'=>$id_chat));
			$strmessages = '';
			while($donnees = $req->fetch()) {
				$temp = json_decode('{"pseudo":"", "status_message": "", "message":""}', true);
				$temp["pseudo"] = $donnees['pseudo'];
				$temp["status_message"] = $donnees['status_message'];
				$temp["message"] = $donnees['message'];
				$strmessages = $strmessages . json_encode($temp) . ",";
			}
			$strmessages = substr($strmessages, 0, strlen($strmessages)-1);
			
			if(isset($_POST['load'])) {
				$req_add_u = $bdd->prepare('INSERT INTO chat_users VALUES(null,:m_id_chat,:m_pseudo,"normal",CURRENT_TIMESTAMP)');
				$req_add_u->execute(array('m_id_chat'=>$id_chat, 'm_pseudo'=>$_SESSION['pseudo']));
			}
			
			$req_u = $bdd->prepare("SELECT * FROM chat_users WHERE id_chat = :m_id");
			$req_u->execute(array('m_id'=>$id_chat));
			$strusers = '';
			while($donnees_u = $req_u->fetch()) {
				$temp_u = json_decode('{"pseudo":"", "status": ""}', true);
				$temp_u["pseudo"] = $donnees_u['pseudo'];
				$temp_u["status"] = $donnees_u['status'];
				$strusers = $strusers . json_encode($temp_u) . ",";
			}
			$strusers = substr($strusers, 0, strlen($strusers)-1);
			
			echo '{"status":"success","users": ['.$strusers.'], "messages": ['.$strmessages.']}';

		}
		
	}
	else {
		//le gars est pas connecté donc
		echo '{"status": "fail"}';
	}

?>