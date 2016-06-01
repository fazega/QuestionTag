<html lang="fr">
	<head>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="js/jquery-ui.min.js"></script>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/animate.css" rel="stylesheet">
			<link href="css/welcome.css" rel="stylesheet">
			<script type="text/javascript">			
			</script>
	</head>
	<body>
		<script src="js/bootstrap.min.js"></script>
		<nav class="navbar navbar-default navbar-static-top questiontag-navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">QuestionTag</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="showSubscribe"><a href="#">></span> S'inscrire</a></li>
					<li class="showLogin"><a><span class="glyphicon glyphicon-log-in"></span> Connection</a></li>
				</ul>
			</div>
		</nav>
			<div class="row top-background">
				<div class="row description-text">
					<h1>Bienvenue sur QuestionTag!</h1>
					<b>QuestionTag vous permet d'obtenir rapidement des réponses aux questions que vous vous posez.</b><br><br>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-2" style="text-align:left;">
							<b>En savoir plus</b><br>
							<span class="glyphicon glyphicon-chevron-down"></span>
						</div>
						<div class="col-sm-2 login-button showLogin showLogin" >
							<b>Se connecter</b><br>
							<span class="glyphicon glyphicon-chevron-down"><span>
						</div>
						<div class="col-sm-2 subscribe-button showSubscribe" >
							<b>S'inscrire</b><br>
							<span class="glyphicon glyphicon-chevron-down"><span>
						</div>
						<div class="col-sm-3"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row connection-row" id="connection">
		<div class="col-sm-6">
			<div class="container login-container loginId">
					<div class="login-title">
						<h3>Connectez-vous !</h3>
					</div>
					<div class="form-box">
						<form action="" method="">
							<input id="login_username" placeholder="Email">
							<input id="login_password" type="password" placeholder="Mot de passe">
							<button class="btn btn-info btn-block login" id="connect_button">Connexion</button>
						</form>
					</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="container login-container subscribeId">
						<div class="login-title">
							<h3>Inscription</h3>
						</div>
						<div class="form-box">
							<form action="" method="">
								<input name="user" type="email" placeholder="Nom complet">
								<input name="user" type="email" placeholder="Email">
								<input type="password" placeholder="Mot de passe">
								<input type="password" placeholder="Répétez le mot de passe">
								<button class="btn btn-info btn-block login">En avant !</button>
							</form>
						</div>
				</div>
		</div>
		</div>
		<script type="text/javascript">
				$(document).ready(function() 
				{
					$(".showLogin").click(function(e)
					{
						e.preventDefault();
						$('.loginId').fadeTo(1000,1);
						$('.subscribeId').fadeTo(1000,0);
						$("html, body").animate({ scrollTop: $('.loginId').offset().top }, 1000);
					});
					
					$(".showSubscribe").click(function(e)
					{
						e.preventDefault();
						$('.subscribeId').fadeTo(1000,1);
						$('.loginId').fadeTo(1000,0);
						$("html, body").animate({ scrollTop: $('.subscribeId').offset().top }, 1000);
					});
			
					$('.subscribeId').fadeTo(1000,0);
					$('.loginId').fadeTo(1000,0);
					
					$('#connect_button').click(function(e) {
						e.preventDefault();
						$.post(
							'../backend/login.php',
							{
								pseudo: $("#login_username").val(),
								password: $("#login_password").val()
							},
							function (rep) {
								if (rep == 'success') {
									$(location).attr('href',"../frontend/index.php");

								} else {
									$s = rep.split(";")[1];
									if($s=="password") {
										$('#login_password').addClass('animated swing');
									}
									else if($s=="pseudo") {
										$('#login_username').addClass('animated swing');
										$('#login_password').addClass('animated swing');

									}
									$('#login_password').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
										function(e) {
										// Code à exécuter apres la transition
										$('#login_password').removeClass('animated swing');
									});
									$('#login_username').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
										function(e) {
										// Code à exécuter apres la transition
										$('#login_username').removeClass('animated swing');
									});
									
								}
							},
							'text'
						);
					});
				});	
				
				
		</script>
</body>
</html>