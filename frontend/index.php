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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/objets.js"></script>
	
		<?php include('navbar.php'); ?>
		<div  id="main" >
			<?php include('main.php'); ?>
		</div>

		<?php include('formulaires.html'); ?>	


		<script>
		   var mainuser = new User("fazega");
		   var chat = new Chat(mainuser, null, "");
		   
		   $(document).ready(function(){  
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
				document.getElementById('reapparitionAnswer').style.display='block';
				redim();
				});
			$('#answer').click(function() {
				reini();
				$('#answer').addClass('agrandirTaille');
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
				$('#description-panel').addClass('animated slideOutLeft');
				$('#title').addClass('animated slideOutLeft');
				
				redim();
				var afterLoaded = function () {
				//ajout dynamique de javascript
			
				var DSLScript  = document.createElement("script");
				DSLScript.src  = "js/chat.js";
				DSLScript.type = "text/javascript";
				var premier_fils = document.body.firstChild;
				document.body.insertBefore(DSLScript , premier_fils);
				$("#ask-chat-panel").css({"display": "block"});
				$("#ask-chat-panel").addClass('slideInRight animated');

				};
				var chargerChat=function (){
					$.get("chat.html", function(data) {
					$("#ask").html(data);
					complete : afterLoaded();
				});
				};
				chat.question = $('#question-form').val();
				chat.users = new Array();
				redim();
				
				setTimeout(chargerChat,1000);
	
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
				
				
		   });   
		</script> 

	</body>
</html>
