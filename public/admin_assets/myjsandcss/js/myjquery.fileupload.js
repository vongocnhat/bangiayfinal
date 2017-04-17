$(document).ready(function() {
	var img;
	$('input[type="file"]').change(function(){
		img = this.value.slice(this.value.lastIndexOf("\\")+1, this.value.length);
		$(this).parent().find('input[type="text"]').val(img);
	});
});