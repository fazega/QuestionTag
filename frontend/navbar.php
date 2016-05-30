<nav class="navbar navbar-default navbar-fixed-top">
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
		<li id="home_link" class="active"><a href="index.php">Ask</a></li>
		<li><a href="#about">Answer</a></li>
		<li><a href="index.php">Home</a></li>
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