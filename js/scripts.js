$(document).ready(function(){

	$('#plus').click(function() {
		$('#plus').toggleClass('glyphicon-plus');
		$('#plus').toggleClass('glyphicon-minus');
		$('#make-post').toggleClass('active');
		if($("#make-post").css('visibility') == 'visible'){
			setTimeout(function(){
				$('#make-post').css('visibility','hidden');
			},10);
		}else{
			setTimeout(function(){
				$('#make-post').css('visibility','visible');
			},200);
		}
	});

	$('.follow').click(function(){
		var innerText = $(this).text();
		if(innerText == 'Follow'){
			$(this).removeClass();
			$(this).addClass("unfollow-button follow btn btn-danger");
			$(this).text("Unfollow");
			var uid = $(this).attr('uid');
			var action = 'follow';
			$.ajax({
				url: "processfollow.php",
				type: "post",
				data: {uid:uid, action:action},
				success: function(result){
					// if(result == "success"){
					// 	var buttonToChange = $("[uid="+uid+"]");

					// }
				}
			});
		}else{
			$(this).text("Follow");
			$(this).removeClass();
			$(this).addClass("follow-button follow btn btn-success");
			var uid = $(this).attr('uid');
			var action = 'delete';
			$.ajax({
				url: "processfollow.php",
				type: "post",
				data: {uid:uid, action:action},
				success: function(result){

				}
			})

		}
	});


	$('.to-follow').click(function(){
		var innerText = $(this).text();
		if(innerText == 'Follow'){	
			var uid = $(this).attr('uid');
			var action = 'follow';
			$(".to-follow").each(function(){
				if($(this).attr('uid') == uid){
					$(this).removeClass();
					$(this).addClass("to-follow following");
					$(this).text("Unfollow");
				}
			});
			$.ajax({
				url: "processfollow.php",
				type: "post",
				data: {uid:uid, action:action},
				success: function(result){
					// if(result == "success"){
					// 	var buttonToChange = $("[uid="+uid+"]");

					// }
				}
			});
		}else{
			var uid = $(this).attr('uid');
			var action = 'delete';
			$(".to-follow").each(function(){
				if($(this).attr('uid') == uid){
					$(this).removeClass();
					$(this).addClass("to-follow not-following");
					$(this).text("Follow");
				}
			});
			$.ajax({
				url: "processfollow.php",
				type: "post",
				data: {uid:uid, action:action},
				success: function(result){

				}
			})

		}
	});

});