$(document).ready(function() {
	$("#owl-demo").owlCarousel({
	    items : 3,
	    lazyLoad : true,
	    autoPlay : true,
	    navigation : true,
	    navigationText : ["",""],
	    rewindNav : false,
	    scrollPerPage : false,
	    pagination : false,
	    paginationNumbers: false,
  	});
});
///////////////////////////////////
jQuery(document).ready(function($){ 
    $('#etalage').etalage({
        thumb_image_width: 300,
        thumb_image_height: 400,
        source_image_width: 900,
        source_image_height: 1000,
        show_hint: true,
        click_callback: function(image_anchor, instance_id){
            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
        }
    });
    // This is for the dropdown list example:
    $('.dropdownlist').change(function(){
        etalage_show( $(this).find('option:selected').attr('class') );
    });
});
/////
jQuery(document).ready(function($) {
    $(".scroll").click(function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
    });
});