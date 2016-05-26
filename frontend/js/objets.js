function Chat(mainuser, users, question) {
	this.mainuser = mainuser;
	this.users = users;
	this.messages = new Array();
	this.question = question;
}

function User(pseudo) {
	this.pseudo = pseudo;
}

function Message(message, date, user) {
	this.message = message;
	this.date = date;
	this.user = user;
}