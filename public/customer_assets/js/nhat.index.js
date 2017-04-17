$(document).ready(function(){
	$('#demo').hide();
	$('.vticker').easyTicker();
});

jQuery('#jquery-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: false, // height of the sliders adapts to current slide
			  useCSS: false, // true, false -> fallback to js if no browser support
			  autoHover: false,
			  transition: 'fade'
			});

$(window).load(function(){
	$( "#slider-range" ).slider({
	            range: true,
	            min: 0,
	            max: 500,
	            values: [ 100, 400 ],
	            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	            }
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});

jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});

$(function(){
    var $cart = $('#cart');
        $('#clickme').click(function(e) {
         e.stopPropagation();
       if ($cart.is(":hidden")) {
           $cart.slideDown("slow");
       } else {
           $cart.slideUp("slow");
       }
    });
    $(document.body).click(function () {
       if ($cart.not(":hidden")) {
           $cart.slideUp("slow");
       } 
    });
    });

$(document).ready(function() {
    /*
    var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
    };
    */
    
    $().UItoTop({ easingType: 'easeOutQuart' });
    
});

//ajax
        function ajaxhtml(diadiem, url, e)
        {
            e.preventDefault();
            $.ajax({
                    url: url,
                    success: function(result) {
                        $(diadiem).html(result);
                    }
                });
            
        }
        function ajaxupdatecart(url)
        {
            $.ajax({
                    url: url,
                });            
        }

        function updateviewcart()
        {
            var totalquantity = 0;
            var totalpay = 0;
            $('input[name="quantity"]').each(function(){
                totalquantity += parseInt(this.value);
            });
            $('.total').each(function(){
                totalpay += parseInt($(this).text());
            });
            $('.totalquantity span').text(totalquantity);
            $('.totalpay span').text(totalpay);
        }
