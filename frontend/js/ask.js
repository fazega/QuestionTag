jQuery(document).ready(function(){
	
	$('#button-valider-question').click(function() {	
		$('#ask-form-panels').addClass('animated slideOutLeft');
		$('#description-panel').addClass('animated slideOutLeft');
		$('#title').addClass('animated slideOutLeft');
		
		redim();
		var afterLoaded = function () {
			$("#ask").find($("#chat-panel")).css({"display": "block"});
			$("#ask").find($("#chat-panel")).addClass('slideInRight animated');
			
			chat_ask.addMessage("SYSTEM", "En attente de reponses ...");
			
			window.removeEventListener('resize',redim,false);
			chat_ask.initJS($("#ask"));
			
			$.get("modal-add-answerers.html", function(data) {
					$("body").append(data);
			});
		};
		var chargerChat=function (){
			$.get("../frontend/chat.html", function(data) {
				$("#ask").html(data);
				complete : afterLoaded();
			});
		};
		chat_ask.question = $('#question-form').val();
		chat_ask.users = new Array();
		chat_ask.possibleUsers = new Array();
		
		<!--TEST-->
		
		redim();
		
		chargerChat();

	});
});