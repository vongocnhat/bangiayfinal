<script type="text/javascript">
$(document).ready(function(){
	//con loi back
	$(document).ajaxComplete(function(ev, jqXHR, settings) {
	    var stateObj = { url: settings.url, innerhtml: document.body.innerHTML };
	    // window.history.pushState(stateObj, settings.url, settings.url); change href
	    window.history.pushState(stateObj, settings.url);
	});

	//tạo back button khi sử dụng ajax
	window.onpopstate = function (e) {
	    var currentState = history.state;
	    document.body.innerHTML = currentState.innerhtml;
	};
	function checkquantity(soluongconlai){
		var soluongdangchon = $('.quickproduct input[name="Quantity"]');
		soluongdangchon.prop('max', $(soluongconlai).val());
		// 
	    	var addtocart = $('.quickproduct .addtocart');
	    	if($(soluongconlai).val() <= 0)
	    	{
	    		addtocart.prop('disabled', 'disabled');
	    		addtocart.val('Đã Hết Sản Phẩm Hãy Chọn Màu Khác');
	    		soluongdangchon.prop('disabled', 'disabled');    		
	    		soluongdangchon.prop('title', 'Đã Hết Sản Phẩm Hãy Chọn Màu Khác');
	    	}
	    	else
	    	{
	    		var soluonghientai = $(soluongconlai).val() - soluongdangchon.val();
	    		soluongdangchon.prop('max', soluonghientai);
	    		$(soluongconlai).val(soluonghientai);
	    		addtocart.prop('disabled', '');
	    		addtocart.val('ADD TO CART');
	    		soluongdangchon.prop('disabled', '');
	    		soluongdangchon.prop('title', 'Nhập số lượng sản phẩm cần mua');
	    	}
	}

	$('.quickproduct').on('keypress', 'input[name="Quantity"]', function(e){
		if(e.which < 48 || e.which > 57)
			return false;
		return true;
	});
	//show nsize click
	$('.quickproduct').on('click', '.nsize', function(){
		$('.quickproduct input[name="Quantity"]').val('');
		$('.nsize').removeClass('nborderred');
    	$(this).find('.nsizeradio').prop('checked', 'checked');
    	$(this).addClass('nborderred');
    	checkquantity($(this).find('input[name="soluongconlai"]'));
	});

//show color product click radio co idproductdetail
    $('.quickproduct').on('click', '.ncolor', function(){
    	$('.quickproduct input[name="Quantity"]').val('');
    	idproductdetail = $(this).siblings('input[name="idproductdetail"]');
    	$('.nboxsize .nsize').each(function(){
    		if($(this).data('idproductdetail') != idproductdetail.val())
    		{
    			$(this).hide();
    		}
    		else
    		{
    			$(this).show();
    		}
    	});
    	$('.nsize').removeClass('nborderred');
    	$('.ncolor').removeClass('nborderred');
    	idproductdetail.prop('checked', 'checked');
    	$(this).addClass('nborderred');
    	// checkquantity($(this).siblings('input[name="soluongconlai"]'));
    });
    
    //add to cart vi co ajax
    //ADD TO CART Click
	$('.quickproduct').on('submit', '.formaddtocart',function(e){
		e.preventDefault();
		checkquantity($(this).find('.nboxsize .nborderred').find('input[name="soluongconlai"]'));
		//set quantity product
        url = '{{ route('cusproduct.cart', ['id' => '', 'Quantity' => '', 'Size' => '', 'xacdinh' => '']) }}' +'/'+ $(this).find('.nborderred').siblings('input[name="idproductdetail"]').val() +'/'+ $(this).find('input[name="Quantity"]').val() + '/' + $('.nborderred').find('.nsizeradio').val() + '/' + 'ADD TO CART';
        ajaxhtml('.cartlist', url, e);
        $(this).after('<span class="nnotify">Added Sucssess</span>');
        $(".nnotify").delay(3000).fadeOut();
    });
    //quantity change
    $('.cartlist').on('change', 'input[name="quantity"]',function(){
    	var quantity = this.value;
    	updateviewcart();
        var price = $(this).parent().siblings('.proprice').text();
        $(this).parent().siblings('.total').html(quantity*price);
        url = '{{ route('cusproduct.cart', ['id' => '', 'Quantity' => '', 'Size' => '','xacdinh' => '']) }}' +'/'+ $(this).parent().parent().data('idproductsq') +'/'+ this.value + '/' + $(this).parent().siblings('.Size').text() + '/' + 'update';
        ajaxupdatecart(url);
    });
    // delete a product in cart
    $('.cartlist').on('click', '.deleteproductincart', function(){
        $(this).parent().parent().remove();
        url = '{{ route('cusproduct.deleteproductincart', ['IdProductSQ' => '']) }}' +'/'+ $(this).parent().parent().data('idproductsq');
        ajaxupdatecart(url);
        updateviewcart();
        if($('.cartlist tr').length == 1)
        	$('.cartlist').html('');
    });

	    //
	    //quick login
	    //check login
	    $('.quickloginform').submit(function(e){
    	 	var datastring = $(".quickloginform").serialize();
    	 	var result;
	    	$.ajax({
			  url: '{{ route('cusproduct.login') }}',
			  data: datastring,
			  type: 'POST',
			  async: false,
			  success: function(data){
			  	result = data;
			  	if(result == 'false')
			  	{
				  	$('.quickloginform').append('<span class="nnotify">User Or Password Not Correct Or User Blocking</span>');
	        		$(".nnotify").delay(10000).fadeOut();
        		}
			  },
			});
		  	if(result == 'false')
			  	return false;
	    });
		$('.quickcart').on('submit', '.formbtn-pay', function(e){
			e.preventDefault();
			@if(Auth::guard('customers')->check())
				window.location = '{{ route('order.create') }}';
			@else
				$('.quicklogin').show('slow');
				$('.quickcart').hide('slow');
			@endif
			//ngăn chặn lây truyền sang body click
		    // e.stopPropagation();
		});
		$('.quicklogin').click(function(e){
			//ngăn chặn lây truyền sang body click
		    e.stopPropagation();
		});
		$('input[name="radioLogin"]').change(function(){
			if(this.value == 'is_login')
			{
				$('input[name="User"]').prop('disabled', '');
				$('input[name="password"]').prop('disabled', '');
			}
			else
			{
				$('input[name="User"]').prop('disabled', 'disabled');
				$('input[name="password"]').prop('disabled', 'disabled');
			}
		});

		//quick cart
		$('.btn-viewcart').click(function(e){
			//load cart
			$('body').animate({scrollTop:0}, 'slow');
			url = '{{ route('cusproduct.constructcart') }}';
        	ajaxhtml('.cartlist', url, e);

			$('.quickcart').show('slow');
			$('.lockbody').show('slow');
			//ngăn chặn lây truyền sang body click
		    e.stopPropagation();
		});
		//chan lan body sau di mo gio hang
		$('.quickcart').click(function(e){
			//ngăn chặn lây truyền sang body click
		    e.stopPropagation();
		});

		$(document).click(function() {
		    $('.quicklogin').hide('slow');
		    $('.quickcart').hide('slow');
		    $('.quickproduct').hide('slow');
		    $('.lockbody').hide('slow');
		});
		$('input[name="close"]').click(function(){
			$(document).click();
		});
		//esc press
		$('body').keydown(function(e){
			if(e.which == 27)
			{
				$(document).click();
			}	
		});
//product click thẻ a vì .product ajax nên ghi vậy
		$('.product-grids').on('click', '.product', function(e){
			$('body').animate({scrollTop:0}, 'slow');
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({
			  url: url,
			  type: 'GET',
			  async: false,
			  success: function(data){
			  	// $('.quickproduct').html(data);
		        $(".quickproduct").html(data);
			  },
			});
			$('.lockbody').show('slow');
			$('.quickproduct').show('slow');
			//ngăn chặn lây truyền sang body click
			e.stopPropagation();
		});

		$('.quickproduct').click(function(e){
			//ngăn chặn lây truyền sang body click
		    e.stopPropagation();
		});
});
</script>