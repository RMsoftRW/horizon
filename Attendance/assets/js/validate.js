/// Jquery validate Project description

jQuery(document).ready(function(){

	$('#pd').submit(function(){

		var action = $(this).attr('action');

		$("#message-p").slideUp(750,function() {
		$('#message-p').hide();
		
		$('#submit-p')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');

		$.post(action, {
			p_title: $('#p_title').val(),
			p_detail: $('#p_detail').val(),
			o_name: $('#o_name').val(),
			user_gn: $('#user_gn').val(),
			user_phone: $('#user_phone').val()
			user_pos: $('#user_pos').val()

		},
			function(data){
				document.getElementById('message-p').innerHTML = data;
				$('#message-p').slideDown('slow');
				$('#pd .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-p').removeAttr('disabled');
				if(data.match('success') != null) $('#pd').slideUp('slow');
			}
		);

	});

		return false;

	});

});
