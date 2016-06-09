
var redim = function(){
	var ask = document.getElementById('ask');
	var answer = document.getElementById('answer');
	var askChatPanel = document.getElementById('ask-chat-panel');
	var askAddAnswerersPanel = document.getElementById('ask-add-answers-panel');
		askChatPanel.style.height='';
		askAddAnswerersPanel.style.height='';
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
				if(ask.offsetHeight<askChatPanel.offsetHeight){
				ask.style.height=askChatPanel.offsetHeight+'px';
				answer.style.height=askChatPanel.offsetHeight+'px';
				}
		
		askChatPanel.style.height=ask.offsetHeight;
		askAddAnswerersPanel.style.height=ask.offsetHeight;
		//Je définis la hauteur du bloc Chat pour qu'il apparaisse entièrement à l'écran
		var hauteur_chat=window.innerHeight-180-(document.getElementById('question-section').offsetHeight);
		document.getElementById('chat-section').style.height=hauteur_chat+"px";
		
		//Je définis la hauteur du bloc Réponses des answerers de Chat pour que sa taille corresponde au Chat
		document.getElementById('reponses-answerers-block').style.height=hauteur_chat-80+"px";
	};
	
function Chat(mainuser, users, question, possibleUsers) {
	this.mainuser = mainuser;
	this.users = users;
	this.possibleUsers = possibleUsers;
	this.messages = new Array();
	this.question = question;
	
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
		data +="<a href='#'><img alt='Del' src='croix.png' class='del-croix' id='del-croix-"+newUser.pseudo+"'/></a></div>";
		data +="</div>";
	$("#positionUsers").parent().append(data);
	redim();
	var chat1= this;
	$('.del-croix').click(function(){chat1.deleteUser($(this).attr('id').replace('del-croix-', ''));});
	$('.answerer-block').hover(function() {
					
					$("#btn-avatar").html("<button type='button' class='btn "+ 'btn-'+chat1.getUser($(this).attr('id')).couleurBtn +" btn-circle btn-lg'>"+$(this).attr('id').charAt(0)+"</button>")
					$("#card-pseudo").html($(this).attr('id'));
					$("#card-skills").html('');
					for(var i=0; i<chat1.getUser($(this).attr('id')).skills.length; i++)
						{
							$("#card-skills").append('#'+chat1.getUser($(this).attr('id')).skills[i]+'<br>');
						}
					$("#card").css({"display": "block"});
					},function() {
					$('#ask-chat-panel').click(function() {$("#card").css({"display": "none"})});
					});
	
	
	$('#reponses-answerers-block').append("<p style='font-size:14px; color:grey;'><em>"+newUser.pseudo+" vient d'être ajouté au chat...</em></p>");
	

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

function Message(message, date, user) {
	this.message = message;
	this.date = date;
	this.user = user;
}

