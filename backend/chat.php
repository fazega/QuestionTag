<?php
	session_start();
	echo '{"status":"success", "pseudo":"'.$_SESSION['pseudo'].'", "message":"'.$_POST['message'].'"}';
?>