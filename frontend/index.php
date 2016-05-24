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

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">

    <!-- Notre style -->
    <link href="style_main.css" rel="stylesheet">
	
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    </nav> <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">QuestionTag</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li id="home_link" class="active"><a href="index.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
		  
		  <?php
			if(count($_SESSION)!=0 AND $_SESSION['pseudo']!=null) {?>
				<li><p class='navbar-text'>Bonjour <?php echo $_SESSION['pseudo'] ?></p></li>
				<li>
					<div class='btn-group' role='group' aria-label='...'>
						<button id='gestion_compte_button' class='btn btn-default navbar-btn'>Gerer mon compte</button>
						<button id='disconnect_button' class='btn btn-default navbar-btn'><span class='glyphicon glyphicon-off'></span></button>
					</div>
				</li>
			<?php } else { ?>
				<li id="login_link"><a>Se connecter</a></li>
				<li id="signup_link"><a>S'incrire</a></li>
			<?php } ?>
			
		  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


 <div  id="contenuPage" >
 			
		<div  id='ask' class='container'>
		
		
		
			<div id='ask-chat-panel'>
		<div class='row'>
		<div id='panel-chat-corps' class='col-md-offset-1 col-md-9'>
			<div id='question-section'>
			<p><br>Michel : <strong>Comment etre pris au CSU?</strong></p>
			</div>
			<div id='chat-section'>
			<div id='reponses-answerers-block'>
			<fieldset><legend></legend>




			
			<div class="row message-block-gauche">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p><strong>PA</strong><br>Demande à Ducoulombier zzzzzzzzzzzzzzzzzzzzzzzz zzzzzzzzzzzzzz zzzzzzzzz dddddddddddddddddddd gggggggggggggggggggg dddddddddddddd ggggggggggggg</p>	
						</div>
						</div>
				<div class="row message-block-droite">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-lg">M</button>
						</div>
						<div class="div-description">
						<p><strong>Michel</strong><br>Arrête de troller</p>	
						</div>
						</div>
						
						<div class="row message-block-gauche">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p><strong>PA</strong><br>Demande à Ducoulombier</p>	
						</div>
						</div>
				<div class="row message-block-droite">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-lg">M</button>
						</div>
						<div class="div-description">
						<p><strong>Michel</strong><br>Arrête de troller</p>	
						</div>
						</div>
						
						<div class="row message-block-gauche">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p><strong>PA</strong><br>Demande à Ducoulombier</p>	
						</div>


						</div>
				<div class="row message-block-droite">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-lg">M</button>
						</div>
						<div class="div-description">
						<p><strong>Michel</strong><br>Arrête de troller</p>	
						</div>
						</div>
						
						<div class="row message-block-gauche">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p><strong>PA</strong><br>Demande à Ducoulombier</p>	
						</div>
						</div>
				<div class="row message-block-droite">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-lg">M</button>
						</div>
						<div class="div-description">
						<p><strong>Michel</strong><br>Arrête de troller</p>	
						</div>
						</div>
						




















						
						<div class="row message-block-gauche">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p><strong>PA</strong><br>Demande à Ducoulombier</p>	
						</div>
						</div>
				<div class="row message-block-droite">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-lg">M</button>
						</div>
						<div class="div-description">
						<p><strong>Michel</strong><br>Arrête de troller</p>	







						</div>
						</div>
			</fieldset>
			</div>
			<div id='my-response-form'>
			<div  class="form-group">


						
						  <label class="control-label" for="question-form">Moi:</label>



						                      
							<textarea class="form-control" id="question-form" name="question-form"></textarea>
						 
						
						</div>
						</div>
			</div>
		</div>
		
				</div>
</div>	

<div id='ask-add-answers-panel'>




			
				<div id='box-answerer-envoye'>


					<fieldset>
						<legend>Avis de réponse envoyé à</legend>
					



















						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-default btn-circle btn-s">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-s">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-s">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						</fieldset>
				
				</div>
				<div id='box-answerer-ajoute'>
					<fieldset>
						<legend>Participants à la réponse</legend>
					
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-warning btn-circle btn-s">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-danger btn-circle btn-s">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						</fieldset>
					</div>
				
				</div>
		
		
		
		
		
		
		<div class='col-md-offset-1 col-md-10'>
			<h1 class='row'>Ask</h1>
			<button type="button" class="btn-s btn-primary" id="right">
				<span class="glyphicon glyphicon-resize-full"></span>
			</button>
			
			<div id='description-ask' class='row'>
				<p><br>Dans cette rubrique vous pouvez poser votre question instantanément pour une réponse en live!<br><p>
			</div>
				
			<div class=' col-md-12'>
			<div id='ask-form-panels' class=' col-md-12'>
					<form class="form-horizontal row">
					
					<fieldset>

						<!-- Form Name -->
						<legend></legend>

						<!-- Text input-->
						
						<div class="form-group row">
						<div class="col-md-12">
						  <label class="control-label" for="pseudo-form">Pseudo</label>  
						  
						  <input id="pseudo-form" name="pseudo-form" type="text" placeholder="pseudo" class="form-control input-s">
						  <span class="help-block">ou bien connectez-vous</span>  
						  
						</div>
						</div>
						<!-- Textarea -->
						
						<div class="form-group row">
						<div class="col-md-10">
						  <label class="control-label" for="question-form">Votre Question</label>
						                      
							<textarea class="form-control" id="question-form" name="question-form"></textarea>
						 
						</div>
						</div>
					<button type="button" class="btn-custom" id="button-valider-question" >
				Valider
			</button>
					</fieldset>
					
					</form>
			



			</div>
			

		
			
			
			
		</div>
			</div>
			
			
			
			</div>
	
	
		

		<div id='answer' class='container'>
			
			<h1>Answer</h1>
			<button type="button" class="btn-s btn-primary" id="left" >	
				<span class="glyphicon glyphicon-resize-full"></span>
			</button>
			
			<p><br>Ceci est la section Answer, elle est magnifique presque aussi belle que la section Aviron! Ceci est la section Answer, elle est magnifique presque aussi belle que la section Aviron! Ceci est la section Answer, elle est magnifique presque aussi belle que la section Aviron!<p>
		</div>
		<button type="button" class="btn-s btn-primary" id="reapparitionAnswer" >Answer</button>	
		<button type="button" class="btn-s btn-primary" id="reapparitionAsk" >Ask</button>
		
		</div>
    

	

<div class="panel panel-default" style="display:none;" id="login_form">
		<div class="panel-heading">
			<h3 class="panel-title">Connexion</h3>
		</div>
		<div class="panel-body">
			<form>
				<label for="login_pseudo_input" class="sr-only">Nom de compte</label>
				<input type="text" id="login_pseudo_input" class="form-control" placeholder="Pseudo" required autofocus>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="login_password_input" class="sr-only">Mot de passe</label>
				<input type="password" id="login_password_input" class="form-control" placeholder="Mot de passe" required>
				
				<div class="checkbox">
				  <label>
					<input type="checkbox" value="remember-me"> Se souvenir de moi
				  </label>
				</div>
				<button id="connect_button" class="btn btn-primary btn-block" type="submit">Se connecter</button>
			</form>
		</div>
	</div>
<div class="panel panel-default" style="display:none;" id="signup_form">
		<div class="panel-heading">
			<h3 class="panel-title">Inscription</h3>
		</div>
		<div class="panel-body">
			<form>
				<label for="inputPseudo">Nom de compte</label>
				<input type="text" id="inputPseudo" class="form-control" placeholder="Pseudo" required autofocus>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="inputPassword">Mot de passe</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="inputPasswordConfirm">Confirmation</label>
				<input type="password" id="inputPasswordConfirm" class="form-control" placeholder="Mot de passe" required>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="inputMail">Adresse mail</label>
				<input type="email" id="inputPseudo" class="form-control" placeholder="Mail" required autofocus>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<button id="signup_button" class="btn btn-primary btn-block" type="submit">M'inscrire !</button>
			</form>
		</div>
	</div>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <script src="js/bootstrap.min.js"></script>
   <script>
   
   
   jQuery(document).ready(function(){  
	var ask = document.getElementById('ask');
	var answer = document.getElementById('answer');
	
	<!-- La fonction redim pour redimensionner les blocs absolute Answer et Ask pour une belle translation -->	
	var redim = function(){
		ask.style.height='';
		answer.style.height='';
	if(ask.offsetHeight<window.innerHeight){
		ask.style.height=window.innerHeight+'px';
		answer.style.height=window.innerHeight+'px';
	}
	if(ask.offsetHeight>answer.offsetHeight){
		answer.style.height=ask.offsetHeight+'px';
		ask.style.height=ask.offsetHeight+'px';
		
	}
	if(ask.offsetHeight<answer.offsetHeight){
	ask.style.height=answer.offsetHeight+'px';
	answer.style.height=answer.offsetHeight+'px';
	}

	
	<!-- Je définis la hauteur du bloc Chat pour qu'il apparaisse entièrement à l'écran -->
	var hauteur_chat=window.innerHeight-180-(document.getElementById('question-section').offsetHeight);
	document.getElementById('chat-section').style.height=hauteur_chat+"px";
	
	<!-- Je définis la hauteur du bloc Réponses des answerers de Chat pour que sa taille corresponde au Chat -->
	document.getElementById('reponses-answerers-block').style.height=hauteur_chat-80+"px";
	};
	window.addEventListener('resize',redim,false);
	
	redim();
	
	function reini(){
		$('#ask').removeClass('reduireTaille');
		$('#answer').removeClass('reduireTaille');
		$('#answer').removeClass('agrandirTaille');
		$('#ask').removeClass('agrandirTaille');
	}

	$('#ask').click(function() {	
		reini();
		$('#ask').addClass('agrandirTaille');
		document.getElementById('right').style.display='none';
		document.getElementById('reapparitionAnswer').style.display='block';
		redim();

		});
	$('#answer').click(function() {
		reini();
		$('#answer').addClass('agrandirTaille');
		document.getElementById('left').style.display='none';
		document.getElementById('reapparitionAsk').style.display='block';
		redim();

		});
	$('#reapparitionAnswer').click(function() {
		document.getElementById('left').style.display='none';
		document.getElementById('reapparitionAnswer').style.display='none';
		document.getElementById('reapparitionAsk').style.display='block';
		$('#ask').removeClass('agrandirTaille');
		$('#ask').removeClass('agrandirTailleDeZero');
		$('#ask').addClass('reduireTaille');
		$('#answer').removeClass('reduireTaille');
		$('#answer').addClass('agrandirTailleDeZero');
		document.getElementById('left').style.display='none';
		document.getElementById('reapparitionAsk').style.display='block';
	

		});
	$('#reapparitionAsk').click(function() {	
		document.getElementById('right').style.display='none';
		document.getElementById('reapparitionAnswer').style.display='block';
		document.getElementById('reapparitionAsk').style.display='none';
		$('#answer').removeClass('agrandirTaille');
		$('#answer').removeClass('agrandirTailleDeZero');
		$('#answer').addClass('reduireTaille');
		$('#ask').removeClass('reduireTaille');
		$('#ask').addClass('agrandirTailleDeZero');
		document.getElementById('right').style.display='none';
		document.getElementById('reapparitionAnswer').style.display='block';
				
		});	
		

	$('#button-valider-question').click(function() {	
		$('#ask-form-panels').addClass('animated slideOutLeft');
		$('#description-ask').addClass('animated slideOutLeft');
		$('#ask-add-answers-panel').addClass('animated slideInRight');
		$('#ask-add-answers-panel').css({"display": "block"});
		$('#ask-chat-panel').addClass('animated slideInRight');
		$('#ask-chat-panel').css({"display": "block"});

		
		redim();
		<!-- Met le scroll en bas -->
		element=document.getElementById('reponses-answerers-block');
		element.scrollTop = element.scrollHeight;
	});	




$('#login_link').click(function() {
		$('#login_form').addClass('animated fadeInDown');
		$('#login_form').css({"display": "block"});
		
		$('#login_form').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
			function(e) {
			// Code à exécuter apres la transition
			$('#login_form').addClass('finished');
		});
	});
	
	$('#connect_button').click(function(e) {
		e.preventDefault();
		$.post(
			'../backend/login.php',
			{
				pseudo: $("#login_pseudo_input").val(),
				password: $("#login_password_input").val()
			},
			function (rep) {
				if (rep == 'success') {
					$(location).attr('href',"../frontend/index.php");

				} else {
					$s = rep.split(";")[1];
					if($s=="password") {
						$('#login_password_input').addClass('animated swing');
					}
					else if($s=="pseudo") {
						$('#login_pseudo_input').addClass('animated swing');
						$('#login_password_input').addClass('animated swing');

					}
					$('#login_password_input').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
						function(e) {
						// Code à exécuter apres la transition
						$('#login_password_input').removeClass('animated swing');
					});
					$('#login_pseudo_input').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
						function(e) {
						// Code à exécuter apres la transition
						$('#login_pseudo_input').removeClass('animated swing');
					});
					
				}
			},
			'text'
		);
	});

	
	$('#signup_link').click(function() {
		$('#signup_form').addClass('animated fadeInDown');
		$('#signup_form').css({"display": "block"});
		
		$('#signup_form').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
			function(e) {
			// Code à exécuter apres la transition
			$('#signup_form').addClass('finished');
		});
	});
	
	$('#signup_passwordconfirm_input').blur(function(e) {
		e.preventDefault();
		if($("#signup_passwordconfirm_input").val() != $("#signup_password_input").val()) {
			$('#signup_passwordconfirm_input').addClass('animated swing');
			$('#signup_passwordconfirm_input').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
				// Code à exécuter apres la transition
				$('#signup_passwordconfirm_input').removeClass('animated swing');
			});
		}
	});
	
	$('#signup_button').click(function(e) {
		e.preventDefault();
		if($("#signup_passwordconfirm_input").val() != $("#signup_password_input").val()) {
			$('#signup_passwordconfirm_input').addClass('animated swing');
			$('#signup_passwordconfirm_input').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
				// Code à exécuter apres la transition
				$('#signup_passwordconfirm_input').removeClass('animated swing');
			});
		}
		else {
			$.post(
			'../backend/inscription.php',
			{
				pseudo: $("#signup_pseudo_input").val(),
				password: $("#signup_password_input").val(),
				mail: $("#signup_mail_input").val()
			},
			function (rep) {
			alert(rep);
				if (rep == 'success') {
					$(location).attr('href',"../frontend/index.php");
				} else {
					$s = rep.split(";")[1];
					if($s=="pseudo") {
						$('#signup_pseudo_input').addClass('animated swing');
					}
					$('#signup_pseudo_input').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
						// Code à exécuter apres la transition
						$('#signup_pseudo_input').removeClass('animated swing');
					});
				}
			},
			'text'
		);
		}
	});
	
	$("#disconnect_button").click(function() {
		$.post(
			'../backend/disconnect.php',
			{
				pseudo: '<?php if(isset($_SESSION['pseudo'])) { echo $_SESSION['pseudo']; }?>'
			},
			function (rep) {
				$(location).attr('href',"../frontend/index.php");
			},
			'text'
		);
	});
	
		
	function intersect(posX, posY, element) {
		return ((posX >= element.position().left) 
		&& (posY >= element.position().top) 
		&& (posY <= element.position().left+element.width()) 
		&& (posY <= element.position().top+element.height()));
	}
	
	$(window).click(function(event) {
		//alert(event.pageX + ' ' + event.pageY + ' '+ $('#login_form').position().left+ ' '+ $('#login_form').position().top+ ' '+$('#login_form').width()+ ' '+$('#login_form').height());
		if($('#login_form').display != "none" && (intersect(event.pageX, event.pageY, $('#login_form'))==false) && $('#login_form').hasClass('finished')) {
			$('#login_form').removeClass('fadeInDown');
			$('#login_form').addClass('fadeOutUp');
			$('#login_form').css({'animation-duration':'0.5s'});
			
			$('#login_form').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
				function(e) {
				// Code à exécuter apres la transition
				$('#login_form').removeClass('animated fadeOutUp');
				$('#login_form').css({"display": "none",'animation-duration': '1s'});
			});
			
			$('#login_form').removeClass('finished');
		}
		
		if($('#signup_form').display != "none" && (intersect(event.pageX, event.pageY, $('#signup_form'))==false) && $('#signup_form').hasClass('finished')) {
			$('#signup_form').removeClass('fadeInDown');
			$('#signup_form').addClass('fadeOutUp');
			$('#signup_form').css({'animation-duration':'0.5s'});
			
			$('#signup_form').one('webkitAnimationEnd oanimationend msAnimationEnd animationend',   
				function(e) {
				// Code à exécuter apres la transition
				$('#signup_form').removeClass('animated fadeOutUp');
				$('#signup_form').css({"display": "none",'animation-duration': '1s'});
			});
			
			$('#signup_form').removeClass('finished');
		}
	});
		
		
   });   </script> 


    
  </body>
</html>
