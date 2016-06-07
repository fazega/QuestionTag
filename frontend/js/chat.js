jQuery(document).ready(function(){
	var redimchat = function(){
		
		var ask = document.getElementById('ask');
		var askChatPanel = document.getElementById('ask-chat-panel');
		askChatPanel.style.height=ask.style.height;
		var askAddAnswerersPanel = document.getElementById('ask-add-answers-panel');
		askAddAnswerersPanel.style.height=ask.style.height;
		//Je définis la hauteur du bloc Chat pour qu'il apparaisse entièrement à l'écran
		var hauteur_chat=window.innerHeight-180-(document.getElementById('question-section').offsetHeight);
		document.getElementById('chat-section').style.height=hauteur_chat+"px";
		
		//Je définis la hauteur du bloc Réponses des answerers de Chat pour que sa taille corresponde au Chat
		document.getElementById('reponses-answerers-block').style.height=hauteur_chat-80+"px";
	};
	window.addEventListener('resize',redimchat,false);
	redimchat();
	
	$('#question-section').html('<p><br> '+mainuser.pseudo+' : <strong>'+chat.question+'</strong></p>');

	var nbMessages = 10;

	function addMessage(pseudo, message) {
		var html = '';
		if(nbMessages % 2 == 1) {
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
		nbMessages += 1;
	}

	$('#question-send-button').click(function(e) {
		e.preventDefault();
		$.post(
			'../backend/chat.php',
			{
				message: $("#chat-input").val()
			},
			function (rep) {
				var jrep = JSON.parse(rep);
				if (jrep["status"]=='success') {
					addMessage(jrep['pseudo'], jrep['message']);
				} else {
					addMessage('SYSTEM', 'Erreur: votre message n\'a pas pu être envoyé. Verifiez que vous êtes toujours connecté.');
				}
			},
			'text'
		);
		$("#chat-input").val("");
	});
});
