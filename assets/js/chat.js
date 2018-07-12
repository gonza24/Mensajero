$(document).ready(function(){

	$(".chat-form").keypress(function(e){
		if(e.keyCode == 13){
			
			var send_message = $("#send_message").val();
			if(send_message.length != ""){
				$.ajax({
					url: 'ajax/send_message.php',
					type: 'POST',
					dataType: 'JSON',
					data: {send_message:send_message},
					success: function(feedback){
						console.log(feedback);
							if(feedback.status == "success"){
								$(".chat-form").trigger('reset')
								alert("El mensaje fue enviado!");
							}
					}
				})
			}
		}
	});

});