<?php
	session_start();
	if(!empty($_POST)) {
		if((count($_SESSION)!=0 AND $_SESSION['pseudo']!=null) AND (isset($_POST['pseudo']) AND ($_POST['pseudo']==$_SESSION['pseudo']))) {
			session_destroy();
		}
	}
?>