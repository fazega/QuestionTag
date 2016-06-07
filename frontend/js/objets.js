function Chat(mainuser, users, question, possibleUsers) {
	this.mainuser = mainuser;
	this.users = users;
	this.possibleUsers = possibleUsers;
	this.messages = new Array();
	this.question = question;
	
}

Chat.prototype.addUser=function(newUser){
	this.users.push(newUser);
	var data="<div id='"+newUser.pseudo+"' class='row answerer-block zoomInDown animated'>";
		data +="<div class='div-bouton'>";
		data +="<button type='button' class='btn btn-default btn-circle btn-s'>P</button>";
		data +="</div>";
		data +="<div class='div-description'>";
		data +="<p>PA<br>#Essai #Guitar #Aviron #Voile</p>";
		data +="</div>";
		data +="</div>";
	$("#positionUsers").parent().append(data);
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
	
	
	
}

function User(pseudo) {
	this.pseudo = pseudo;
}

function Message(message, date, user) {
	this.message = message;
	this.date = date;
	this.user = user;
}

