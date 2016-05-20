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
	
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">QuestionTag</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li id="home_link" class="active"><a href="index.php">Home</a></li>
            <li><a>About</a></li>
            <li><a>Contact</a></li>
          </ul>
		  <ul id="navbar_right" class="nav navbar-nav navbar-right">
		  
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
		
		<div class='col-md-12'>
			<h1 class='row'>Ask</h1>
			<button type="button" class="btn-s btn-primary" id="right">
				<span class="glyphicon glyphicon-resize-full"></span>
			</button>
			
			<div class='row'>
				<p><br>Ceci est la section Ask, elle est très moche comme la section Bad! Ceci est la section Ask, elle est très moche comme la section Bad! Ceci est la section Ask, elle est très moche comme la section Bad!<br><p>
			</div>
				
				
			<div id='ask-form-panels' class='col-md-6'>
					<form class="form-horizontal row">
					
					<fieldset>

						<!-- Form Name -->
						<legend class='row'>Ask</legend>

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
						<div class="col-md-12">
						  <label class="control-label" for="question-form">Votre Question</label>
						                      
							<textarea class="form-control" id="question-form" name="question-form"></textarea>
						 
						</div>
						</div>
					</fieldset>
					
					</form>
				
			
				<div class='row'>
				
					<fieldset>
						<legend class='row'>Les réponses</legend>
						
						<p class="row">Voila voila ici je reponds a ta question <br> ici aussi et blabla<br> ici aussi et blabla<br> ici aussi et blabla<br> ici aussi et blabla</p>
						
						<div class="form-group row">
						  	<div class="col-md-12">                     
							<textarea class="form-control" id="reponse" name="reponse"></textarea>
						  </div>
						</div>
					</fieldset>
				
				</div>
			</div>
			<div id='ask-add-answers-panel' class='col-md-6'>
				<div class="col-md-12">
					<fieldset>
						<legend>Ajouter des Answerers</legend>
					<div class="col-md-12">
					<div id="answerers-conteneur">
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-default btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-success btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-info btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-warning btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
						<div class="row answerer-block">
						<div class="div-bouton">
						<button type="button" class="btn btn-danger btn-circle btn-lg">P</button>
						</div>
						<div class="div-description">
						<p>PA<br>#Reason #Guitar #Aviron #Voile</p>	
						</div>
						</div>
				</div>
				</div>
				</fieldset>
				</div>
			</div>
		</div>
		
		</div>
		
		
		<div id='answer'>
			
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
					<input type="checkbox" value="remember-me"> Se souvenir de moi</input>
				  </label>
				</div>
				<button type="submit" href="#" id="connect_button" class="btn btn-primary btn-block">Se connecter</button>
			</form>
		</div>
	</div>
<div class="panel panel-default" style="display:none;" id="signup_form">
		<div class="panel-heading">
			<h3 class="panel-title">Inscription</h3>
		</div>
		<div class="panel-body">
			<form>
				<label for="signup_pseudo_input">Nom de compte</label>
				<input type="text" id="signup_pseudo_input" class="form-control" placeholder="Pseudo" required>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="signup_password_input">Mot de passe</label>
				<input type="password" id="signup_password_input" class="form-control" placeholder="Mot de passe" required>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="signup_passwordconfirm_input">Confirmation</label>
				<input type="password" id="signup_passwordconfirm_input" class="form-control" placeholder="Mot de passe" required>
				<hr style="margin:5px 0 5px 0;opacity:0;">
				<label for="signup_mail_input">Adresse mail</label>
				<input type="email" id="signup_mail_input" class="form-control" placeholder="Mail" required>
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
		
		});
	$('#answer').click(function() {
		reini();
		$('#answer').addClass('agrandirTaille');
		document.getElementById('left').style.display='none';
		document.getElementById('reapparitionAsk').style.display='block';
		
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
