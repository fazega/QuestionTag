jQuery(document).ready(function(){
	
	//Ne marche pas en mettant indic en id !!!!
	$(".answer-question-block").hover(function() {
		$(this).append("<p class='indic' style='display:inline-block'>Repondre</p>");
		$(this).css('cursor','pointer');
	});
	
	$(".answer-question-block").mouseleave(function() {
		$(this).find(".indic").remove();
		$(this).css('cursor','pointer');
	});
	
	$(".answer-question-block").click(function() {
		$.post(
			'../backend/chat.php',
			{
				load: 1
			},
			function (rep) {
				var jrep = JSON.parse(rep);
				var afterLoaded = function () {

					$("#answer").find($("#chat-panel")).css({"display": "block"});
					$("#answer").find($("#chat-panel")).addClass('slideInRight animated');
					
					
					chat_answer.initJS($("#answer"));
					
					if (jrep["status"]=='success') {
						$.each(jrep["users"], function() {
							chat_answer.addUser(new User(this["pseudo"],['Patron J80','muscu','info']));
						});
						chat_answer.addMessage('SYSTEM', "Vous avez rejoint la question de fazega");
					}
					else {
						chat_answer.addMessage('SYSTEM', 'Erreur.');
					}
				};
				chat_answer.users = new Array();
				chat_answer.possibleUsers = new Array();
				var chargerChat=function (){
					$.get("../frontend/chat.html", function(data) {
						$("#answer").html(data);
						complete : afterLoaded();
					});
				};
				
				chargerChat();
				
				redim();
				
			},
			'text'
		);
	});
});

