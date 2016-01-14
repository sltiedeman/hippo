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

});