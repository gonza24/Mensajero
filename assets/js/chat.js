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
								show_messages();
								$(".messages").animate({scrollTop: $(".messages")[0].scrollHeight}, 2000);
							}
					}
				})
			}
		}
	})

	// Envío/Subida de imagenes y archivos
	$("#upload-files").change(function(){
		var file_name = $("#upload-files").val();
		if(file_name.length != ""){
			$.ajax({
				type: 'POST',
				url: 'ajax/send_files.php',
				data: new FormData($(".chat-form")[0]),
				contentType: false,
				processData: false,
				success: function(feedback){
					if(feedback == "error"){
						$(".files-error").addClass("show-file-error");
						$(".files-error").html("<span class='files-cross-icon'>&#x2715;</span>"+ "Por favor, elige una imagen válida/archivo");
						setTimeout(function(){
							$(".files-error").removeClass("show-file-error");

						}, 5000);
					}else if(feedback === "success"){
						show_messages();
						$(".messages").animate({scrollTop: $(".messages")[0].scrollHeight}, 2000);
					}
				}
			})
		}
	})

	//Envío/Subida de emojis
	$(".emoji-same").click(function() {
		var emoji = $(this).attr("src"); 
		$.ajax({
			url: 'ajax/send_emoji.php',
			type: 'POST',
			dataType: 'JSON',
			data: {'send_emoji': emoji},
			success: function(feedback){
				if(feedback.status == "success"){
					show_messages();
					$(".messages").animate({scrollTop: $(".messages")[0].scrollHeight}, 2000);
				}
			}
		})
	})

	$(".clean").click(function(){
		var clean = 1;
		$.ajax({
			type : 'POST',
			url : 'ajax/clean.php',
			data : {"clean" : clean},
			dataType : 'JSON',
			function(feedback){
				if(feedback['status'] == 'clean'){
					show_messages();
				}
			}
		})
	})

	online_users();
	setInterval(function(){
		show_messages();
		user_status();
		online_users();
	}, 3000);
})

// Mostrar usuarios online+
function online_users(){
	$.ajax({
		type : 'GET',
		url : 'ajax/online_users.php',
		dataType : 'JSON',
		success : function(feedback){
			if(feedback['users'] == 1){
				$(".online_users").html("<span class='show-online'></span> " + "Sólo Tu");
			}else{
				$(".online_users").html("<span class='show-online'></span>Usuarios en linea: " + feedback['users']);
			}
		}
	})
}

// Para controlar el tiempo de logueo 
function user_status(){
	$.ajax({
		type : 'GET',
		url : 'ajax/users_status.php',
		dataType : 'JSON',
		 success : function(feedback){
		 	if(feedback['status'] == "href"){
		 		window.location = "login.php";
		 	}
		 }
	})
}


//Mostrar mensajes desde BD
function show_messages(){
	var msg = true;
	$.ajax({
		url: 'ajax/show_messages.php',
		type: 'GET',
		data: {'message': msg},
		success: function(feedback){
			$(".messages").html(feedback);
		}
	});

}

show_messages();

$(".messages").animate({scrollTop: $(".messages")[0].scrollHeight}, 2000);
