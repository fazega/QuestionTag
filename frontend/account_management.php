<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">


		<title>QuestionTag</title>

		<!-- Librairies externes -->
		
		<!--cette balise permet d'inclure le .html depuis un .php, si on ne la met pas on a un probleme de chemin dans les inclusions ... -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">

		<!-- Notre style -->
		<link href="style_main.css" rel="stylesheet">
		<link rel="stylesheet" href="css/account_management.css">
	</head>
	
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/objets.js"></script>
	
		<?php include('navbar.php'); ?>
		<div id="mainContainer">
			<div  class="col-sm-12">
				<h3>Left Tabs</h3>
				<hr/>
				<div class="col-sm-3"> <!-- required for floating -->
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs tabs-left sideways">
					<li class="active"><a href="#coord-v" data-toggle="tab">Mon compte</a></li>
					<li><a href="#security-settings-v" data-toggle="tab">Sécurité</a></li>
					<li><a href="#csettings-v" data-toggle="tab">Confidentialité</a></li>
					<li><a href="#messages-v" data-toggle="tab">Messages</a></li>
				  </ul>
				</div>

				<div class="col-sm-9">
				  <!-- Tab panes -->
				  <div class="tab-content">
					<div class="tab-pane active" id="coord-v">
							<div class="col-sm-2"></div>
							<div class="col-sm-6">
								<h4>Informations générales</h4><br>
								<div class="fieldsContainer">
									<label for="name">Nom : </label><input type="text"  class="form-control" id="name" disabled="disabled" value="<?php echo($_SESSION['pseudo']); ?>"><br>
									<label for="surname">Prénom : </label><input type="text" class="form-control" id="surname" disabled="disabled" value="<?php echo($_SESSION['pseudo']); ?>"><br>
									<i style="font-size: 8pt; color: gray;">Il est impossible de modifier votre nom complet. Vous pouvez cependant modifier la façon dont il apparaît en vous rendant dans la section Confidentialité.</i>
									<br><br>
									<label for="email">E-mail : </label>
									<div class="input-group">
										<input type="text" class="form-control" id="email" disabled="disabled">
										<span class="input-group-btn">
										<button class="btn btn-secondary" type="button" id="enableMail">Modifier</button>
										</span>
										
									</div>
									<br><h4>Informations complémentaires</h4><br>
									<label for="city">Ville actuelle : </label>
									<div class="input-group">
										<input type="text" class="form-control" id="city" disabled="disabled">
										<span class="input-group-btn">
										<button class="btn btn-secondary" type="button" id="enableCity">Modifier</button>
										</span>
									</div><br>
									<label for="hobbies">Centres d'intérêt : </label>
									<div class="input-group">
										<input type="text" class="form-control" id="hobbies">
										<span class="input-group-btn">
										<button class="btn btn-secondary" type="button">Ajouter...</button>
										</span>
									</div>
									<i style="font-size: 8pt; color: gray;">Vos centres d'intérêt et domaines de compétence seront utilisés pour vous proposer de répondre aux questions les plus pertinentes avec votre profil.</i>
									<br><br>
									<label for="city">A propos de moi : </label>
									<input type="text" class="form-control" id="aboutme"><br>
									<i style="font-size: 8pt; color: gray;">Ecrivez quelques lignes à propos de vous afin que les autres utilisateurs puissent mieux vous connaître.</i><br><br>
								</div>
									<div class="btn-group pull-right" style:"right:0">
										<button type="button" class="btn btn-success" id="applyChanges">Appliquer</button>
										<button type="button" class="btn btn-danger">Annuler</button>
									</div>
								<br>
								<b class="changesDone" hidden>Modifications enregistrées !</b>
								<br><br>
							</div>
							<div class="col-sm-3"></div>
					</div>
					<div class="tab-pane" id="security-settings-v">
						<div class="col-sm-2"></div>
						<div class="col-sm-6">
							<h4>Préférences de sécurité</h4><br>
								<div class="fieldsContainer">
									<b>Modification du mot de passe</b><br><br>
									<label for="oldPassword">Ancien mot de passe : </label>
									<input type="password" class="form-control" id="oldPassword"><br><br>
									<label for="newPassword">Nouveau mot de passe : </label>
									<input type="password" class="form-control" id="newPassword"><br><br>
									<label for="repeatPassword">Répétez le nouveau mot de passe : </label>
									<input type="password" class="form-control" id="repeatPassword"><br><br>
								<div class="btn-group pull-right" style:"right:0">
												<button type="button" class="btn btn-success" id="applyChangesSecurity">Appliquer</button>
												<button type="button" class="btn btn-danger">Annuler</button>
								</div>
								<br>
								<b class="changesDoneSecurity" hidden>Modifications enregistrées !</b>
								<br><br>
							</div>
						<div class="col-sm-3"></div>
					</div>
					</div>
					
					<div class="tab-pane" id="csettings-v">Préférences de confidentialité.</div>
					<div class="tab-pane" id="messages-v">Messages Tab.</div>
				</div>

				</div>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$.post("../backend/account_management.php", {request: 'getCity'}, function(result){
					$("#city").val(result);
				});
				$.post("../backend/account_management.php", {request: 'getMail'}, function(result){
					$("#email").val(result);
				});
				$.post("../backend/account_management.php",{request: 'getUserText'}, function(result){
					$("#aboutme").val(result);
				});
				$("#applyChanges").click(function(e)
				{
					e.preventDefault();
					var mail = $('#email').val();
					var city = $('#city').val();
					var userText = $('#aboutme').val();
					$.post("../backend/account_management.php", {request: "modifyAccount", mail: mail, city: city, userText: userText}, function(result){
						$("#city").attr({'disabled': 'disabled'});
						$("#email").attr({'disabled': 'disabled'});
						$(".changesDone").fadeOut('fast');
						$(".changesDone").removeAttr('hidden');
						$(".changesDone").fadeIn("slow").delay(3000).fadeOut("slow");
				});
				});
				$("#enableCity").click(function(e)
				{
					e.preventDefault();
					$("#city").removeAttr('disabled');
				});
				$("#enableMail").click(function(e)
				{
					e.preventDefault();
					$("#email").removeAttr('disabled');
				});
				$("#applyChangesSecurity").click(function(e)
				{
					e.preventDefault();
					var oldPassword = $('#oldPassword').val();
					var newPassword = $('#newPassword').val();
					var repeatPassword = $('#repeatPassword').val();
					$.post("../backend/account_management.php", {request: "changePwd", oldPassword: oldPassword, newPassword: newPassword, repeatPassword: repeatPassword}, function(result){
						if(result==="success")
						{
							$('.changesDoneSecurity').css('color', 'green');
							$('.changesDoneSecurity').html("Modifications effectuées !");
							$('.changesDoneSecurity').removeAttr('hidden');
							$('.changesDoneSecurity').fadeIn("fast").delay(3000).fadeOut("slow");
						}
						if(result==="passwordsNotIdentical")
						{
							$('.changesDoneSecurity').css('color', 'red');
							$('.changesDoneSecurity').html("Les deux mots de passe indiqués ne sont pas identiques !");
							$('.changesDoneSecurity').removeAttr('hidden');
							$('.changesDoneSecurity').delay(3000).fadeOut("slow");
						}
						if(result==="wrongPassword")
						{
							$('.changesDoneSecurity').css('color', 'red');
							$('.changesDoneSecurity').html("Le mot de passe entré n'est pas correct !");
							$('.changesDoneSecurity').removeAttr('hidden');
							$('.changesDoneSecurity').delay(3000).fadeOut("slow");
						}
						$(".changesDoneSecurity").fadeOut('fast');
						$(".changesDoneSecurity").removeAttr('hidden');
						$(".changesDoneSecurity").fadeIn("slow").delay(3000).fadeOut("slow");
				});
				});
			});
		</script>
	</body>
</html>