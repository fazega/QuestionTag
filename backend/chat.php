<?php
	session_start();
	if(isset($_SESSION['pseudo'])) {
		echo '{"status":"success", "pseudo":"'.$_SESSION['pseudo'].'", "message":"'.$_POST['message'].'"}';
	}
	else {
		echo '{"status": "fail"}';
	}

?>