function show_error(msg){
	ht = '<div class="alert alert-error"><a hrer="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
}
function show_success(msg){
	ht = '<div class="alert alert-success"><a hrer="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
}
function show_info(msg){
	ht = '<div class="alert alert-info"><a hrer="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
}
