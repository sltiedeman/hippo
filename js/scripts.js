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

	//For unfollowing a user from follow.php page
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

	//For following or unfollowing a user on index.php page
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

	//Building in voting functionality
	$('.vote').click(function(){
		var postid = $(this).attr('postid');
		// var arrowToChange = $("[postid="+postid+"]");
		if($(this).hasClass('up-vote')){
			var voteValue = 1;
		}else if ($(this).hasClass('down-vote')){
			var voteValue = -1;
		}else{
			var voteValue = 0;
		}

		var value = Number($('.count').html());
		value += voteValue;


		if(voteValue != 0){
			$.ajax({
				url: "processvote.php",
				type: "post",
				data: {postid: postid, voteValue: voteValue, value:value},
				success: function(result){
					console.log(result);
					$(".count").each(function(){
						if($(this).attr('postid') == postid){
							var value = Number($(this).html());
							if(result=='add-one'){
								value++;
								$(this).text(value);
							}else if(result=='subtract-one'){
								value--;
								$(this).text(value);
							}
						}
					});
					$(".error").each(function(){
						if($(this).attr('postid') == postid){
							if(result =='no-more-up-votes'){
								$(this).text("You can not up-vote more than once");
							}else if(result =='no-more-down-votes'){
								$(this).text("You can not down-vote more than once");
							}else{
								$(this).text("");
							}
						}
					})
				
				}
			});
		}

	})

});