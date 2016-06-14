
var redim = function(){
	var ask = $("#ask");
	var answer = $("#answer");
	var chatPanel = $("#chat-panel");
	var addAnswerersPanel = $('#add-answers-panel');
	
	if(ask.offsetHeight<window.innerHeight){
		ask.css({"height":window.innerHeight+'px'});
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
	if(ask.offsetHeight<chatPanel.offsetHeight){
		ask.style.height=chatPanel.offsetHeight+'px';
		answer.style.height=chatPanel.offsetHeight+'px';
	}
	
	chatPanel.css({"height":ask.offsetHeight});
	addAnswerersPanel.css({"height":ask.offsetHeight});
	//Je définis la hauteur du bloc Chat pour qu'il apparaisse entièrement à l'écran
	var hauteur_chat=window.innerHeight-180-($('#question-section').offsetHeight);
	$('#chat-section').css({"height":hauteur_chat+" px"});
	
	//Je définis la hauteur du bloc Réponses des answerers de Chat pour que sa taille corresponde au Chat
	$('#reponses-answerers-block').css({"height":hauteur_chat-80+" px"});
};
			
function Chat(mainuser, users, question, possibleUsers) {
	this.mainuser = mainuser;
	this.users = users;
	this.possibleUsers = possibleUsers;
	this.messages = new Array();
	this.question = question;
	this.nbMessages = 0;
}

Chat.prototype.addMessage = function(pseudo, message) {
	if(pseudo == "SYSTEM") {
		$('#reponses-answerers-block').append("<p style='font-size:14px; color:grey;'><em>"+message+"</em></p>");
	}
	else {
		var html = '';
		if(this.nbMessages % 2 == 1) {
			html += '<div class="row message-block-droite">';
		}
		else {
			html += '<div class="row message-block-gauche">';
		}
		html += 	'<div class="div-bouton">'
		html += 		'<button type="button" class="btn btn-success btn-circle btn-lg">'+pseudo.charAt(0)+'</button>';
		html +=		'</div>';
		html += '<div class="div-description">'
		html += 	'<p><strong>'+pseudo+'</strong><br>'+message+'</p>';
		html += '</div></div>';
		$('#reponses-answerers-block').append(html);
		this.nbMessages += 1;
	}
	this.messages.unshift(new Message(message, null, pseudo));
}

Chat.prototype.getUser=function(pseudo){
	for(var i=0; i<this.users.length; i++)
		{
		 if(this.users[i].pseudo==pseudo)
		 {
			 return this.users[i];
		 }
		}
};

Chat.prototype.initJS = function(superdiv) {
	
	var chat = this;

	var redimchat = function(){
		var chatPanel = superdiv.find($('#chat-panel'));
		chatPanel.css({"height":superdiv.height()});
		var addAnswerersPanel = superdiv.find($('#add-answers-panel'));
		addAnswerersPanel.css({"height":superdiv.height()});
		//Je définis la hauteur du bloc Chat pour qu'il apparaisse entièrement à l'écran
		var hauteur_chat=window.innerHeight-180-(superdiv.find($('#question-section')).offsetHeight);
		superdiv.find($('#chat-section')).css({"height":hauteur_chat+" px"});
		
		//Je définis la hauteur du bloc Réponses des answerers de Chat pour que sa taille corresponde au Chat
		superdiv.find($('#reponses-answerers-block')).css({"height":hauteur_chat-80+" px"});
	};
	window.addEventListener('resize',redimchat,false);
	redimchat();
	
	superdiv.find($('#question-section')).html('<p><br> '+mainuser.pseudo+' : <strong>'+chat_ask.question+'</strong></p>');

	var nbMessages = 10;

	superdiv.find($('#question-send-button')).click(function(e) {
		e.preventDefault();
		$.post(
			'../backend/chat.php',
			{
				message: superdiv.find($("#chat-input")).val()
			},
			function (rep) {
				var jrep = JSON.parse(rep);
				if (jrep["status"]=='success') {
					chat.addMessage(jrep['pseudo'], jrep['message']);
				} else {
					chat.addMessage('SYSTEM', 'Erreur: votre message n\'a pas pu être envoyé. Verifiez que vous êtes toujours connecté.');
				}
			},
			'text'
		);
		superdiv.find($("#chat-input")).val("");
	});
	
	
	function check() {
		$.post(
			'../backend/chat.php',
			{
				check : 1
			},
			function (rep) {
				var jrep = JSON.parse(rep);
				if (jrep["status"]=='success') {
					$.each(jrep["users"], function() {
						var add = true;
						for(var i = 0; i < chat.users.length; i++) {
							if(chat.users[i].pseudo == this["pseudo"])
								add = false;
						}
						if(add)
							chat.addUser(new User(this["pseudo"],['Patron J80','muscu','info']));
					});
					
					$.each(jrep["messages"], function() {
						var add = true;
						for(var i = 0; i < chat.messages.length; i++) {
							if((chat.messages[i].pseudo == this["pseudo"]) && (chat.messages[i].message == this["message"]))
								add = false;
						}
						if(add) {
							chat.addMessage(this["pseudo"], this["message"]);
						}
					});
				}
				else {
					chat_answer.addMessage('SYSTEM', 'Erreur de reload.');
				}
			},
			'text'
		);
		
	}
	setInterval(check, 500);
}

Chat.prototype.addUser=function(newUser){
		var couleurBtn = "default";
	if (this.users.length%5==0){
		newUser.couleurBtn = "default";
	}
	if (this.users.length%5==1){
		newUser.couleurBtn = "danger";
	}
	if (this.users.length%5==2){
		newUser.couleurBtn = "warning";
	}
	if (this.users.length%5==3){
		newUser.couleurBtn = "success";
	}
	if (this.users.length%5==4){
		newUser.couleurBtn = "info";
	}
	
	this.addMessage("SYSTEM", newUser.pseudo+" vient d'être ajouté au chat.");
	
	this.users.unshift(newUser);
	var data="<div id='"+newUser.pseudo+"' class='row answerer-block zoomInDown animated'>";
		data +="<div class='div-bouton'>";
		data +="<button type='button' class='btn btn-"+newUser.couleurBtn+" btn-circle btn-s'>"+newUser.pseudo.charAt(0).toUpperCase()+"</button>";
		data +="</div>";
		data +="<div class='div-description'>";
		data +="<p>"+newUser.pseudo+"<br>"
		for(var i=0; i<newUser.skills.length; i++)
		{
			data += "#"+newUser.skills[i]+"<br/>";
		}
		data += "</p>";
		data +="<a href='#'><img alt='Del' src='design/croix.png' class='del-croix' id='del-croix-"+newUser.pseudo+"'/></a></div>";
		data +="</div>";
	$("#positionUsers").parent().append(data);
	redim();
	var chat = this;
	$('.del-croix').click(function(){chat.deleteUser($(this).attr('id').replace('del-croix-', ''));});
	$('.answerer-block').hover(function() {
		$("#btn-avatar").html("<button type='button' class='btn "+ 'btn-'+chat.getUser($(this).attr('id')).couleurBtn +" btn-circle btn-lg'>"+$(this).attr('id').charAt(0)+"</button>")
		$("#card-pseudo").html($(this).attr('id'));
		$("#card-skills").html('');
		for(var i=0; i<chat.getUser($(this).attr('id')).skills.length; i++)
			{
				$("#card-skills").append('#'+chat.getUser($(this).attr('id')).skills[i]+'<br>');
			}
		$("#card").css({"display": "block"});
		},function() {
		$('#chat-panel').click(function() {$("#card").css({"display": "none"})});
		});
	
}



Chat.prototype.deleteUser=function(delPseudo){
	$("#"+delPseudo).addClass('zoomOutDown animated');
	setTimeout(function(){$("#"+delPseudo).remove()},1000);

	for (var i=0; i<this.users.length; i++){
		if(this.users[i].pseudo == delPseudo)
		{
			this.users.splice(i, 1);
		}
	}
	redim();
	
	
	
}


Chat.prototype.addPossibleUser=function(newUser){
	var couleurBtn = "default";
	if (this.possibleUsers.length%5==0){
		newUser.couleurBtn = "default";
	}
	if (this.possibleUsers.length%5==1){
		newUser.couleurBtn = "danger";
	}
	if (this.possibleUsers.length%5==2){
		newUser.couleurBtn = "warning";
	}
	if (this.possibleUsers.length%5==3){
		newUser.couleurBtn = "success";
	}
	if (this.possibleUsers.length%5==4){
		newUser.couleurBtn = "info";
	}
	
	this.possibleUsers.unshift(newUser);
	var data="<div id='"+newUser.pseudo+"' class='row answerer-block zoomInDown animated'>";
		data +="<div class='div-bouton'>";
		data +="<button type='button' class='btn btn-"+newUser.couleurBtn+" btn-circle btn-s'>"+newUser.pseudo.charAt(0).toUpperCase()+"</button>";
		data +="</div>";
		data +="<div class='div-description'>";
		data +="<p>"+newUser.pseudo+"<br>"
		for(var i=0; i<newUser.skills.length; i++)
		{
			data += "#"+newUser.skills[i]+"<br/>";
		}
		data += "</p>";
		data +="</div>";
		data +="</div>";
	$("#positionPossibleUsers").parent().append(data);
	redim();
	

}

Chat.prototype.deletePossibleUser=function(delPseudo){
	$("#"+delPseudo).addClass('zoomOutDown animated');
	setTimeout(function(){$("#"+delPseudo).remove()},1000);

	for (var i=0; i<this.possibleUsers.length; i++){
		if(this.possibleUsers[i].pseudo == delPseudo)
		{
			this.possibleUsers.splice(i, 1);
		}
	}
	redim();
	
	
	
}

function User(pseudo, skills) {
	this.pseudo = pseudo;
	this.skills = skills;
	this.couleurBtn = "default";
}

function Message(message, date, pseudo) {
	this.message = message;
	this.date = date;
	this.pseudo = pseudo;
}

