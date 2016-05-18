<?php
	session_start();
	include(dirname(__DIR__)."/frontend/index.html");
?>

<script>
   jQuery(document).ready(function(){  
		<?php

		if(count($_SESSION)!=0 AND $_SESSION['pseudo']!=null) {
			$h = "";
			$h = $h . "<li><p class='navbar-text'>Bonjour ".$_SESSION['pseudo']."</p></li>";
			$h = $h . "<li><div class='btn-group' role='group' aria-label='...'><button id='gestion_compte_button' class='btn btn-default navbar-btn'>Gerer mon compte</button>";
			$h = $h . "<button id='disconnect_button' class='btn btn-default navbar-btn'><span class='glyphicon glyphicon-off'></span></button></div></li>";
		?>
			$("#navbar_right").html("<?php echo $h ?>");
			
			$("#disconnect_button").click(function() {
						$.post(
						'backend/disconnect.php',
						{
							pseudo: '<?php echo $_SESSION['pseudo'] ?>'
						},
						function (rep) {
							$(location).attr('href',"backend/index.php");
						},
						'text'
					);
			});
		<?php } ?>
   });
</script>
