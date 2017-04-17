<div class="content details-page">
    <!--start-product-details-->
    <div class="product-details">
        <div class="wrap">
        <div class="details-left">
            <div class="details-left-slider">
                <ul id="etalage">
                @foreach($product->ProductDetail as $productdetail)
                        <li>
                            <img class="etalage_thumb_image" src="admin_assets/productimages/small/{{ 'small'.$productdetail->Image }}" />
                            <img class="etalage_source_image" src="admin_assets/productimages/large/{{ 'large'.$productdetail->Image }}" />                     
                        </li>
                    @if($productdetail->Image2 != "")
                        <li>
                            <img class="etalage_source_image" src="admin_assets/productimages/large/{{ 'large'.$productdetail->Image2 }}" />
                            <img class="etalage_thumb_image" src="admin_assets/productimages/small/{{ 'small'.$productdetail->Image2 }}" />
                        </li>
                    @endif
                    @if($productdetail->Image3 != "")
                        <li>
                            <img class="etalage_source_image" src="admin_assets/productimages/large/{{ 'large'.$productdetail->Image3 }}" />
                            <img class="etalage_thumb_image" src="admin_assets/productimages/small/{{ 'small'.$productdetail->Image3 }}" />
                        </li>
                    @endif
                @endforeach
                </ul>
            </div>
            <div class="details-left-info">
                <div class="details-right-head">
                <h1>{{ $product->Name }}</h1>
                <ul class="pro-rate">
                    <li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
                    <li><a href="#">0 Review(s) Add Review</a></li>
                </ul>
                <p class="product-detail-info">{{ $product->Description }}</p>
                {{-- <a class="learn-more" href="#"><h3>MORE DETAILS</h3></a> --}}
                <div class="product-more-details">
                    <ul class="price-avl">
                        <li class="price">
                        @if($product->PricePromotion > 0)
                            <span>{{ $product->Price }} VND</span>
                            <label>{{ $product->PricePromotion }} VND</label></li>
                        @else
                            <label>{{ $product->Price }} VND</label></li>
                        @endif
                        <li class="stock"><i>In stock</i></li>
                        <div class="clear"> </div>
                    </ul>
               <form class="formaddtocart">
                    <ul class="product-colors">
                        <h3>available Colors ::</h3>
<?php
session_start();
$soluongconlai;
?>
                        @foreach($product->ProductDetail as $productdetail)
                            <li class="nboximg">
                                <img class="ncolor" src="admin_assets/productimages/small/{{ 'small'.$productdetail->Image }}" title="Select A Color" />
                                <input type="radio" name="idproductdetail" value="{{ $productdetail->id }}" required  style="z-index: -1;">
                            </li>                            
                        @endforeach
                        <ul class="product-qty">
                            Size: 


                            <ul class="nboxsize">
                                @foreach($product->ProductDetail as $productdetail)
                                    @foreach($productdetail->ProductSQ as $productsq)
<?php
    $soluongdamua = 0;
    if(!empty($_SESSION['productdetails'][$productsq->id]))
    {
        $soluongdamua = $_SESSION['productdetails'][$productsq->id]['Quantity'];
    }
    $soluongconlai = $productsq->Quantity - $soluongdamua;
?>
                                        <li class="nsize" data-idproductdetail = "{{ $productsq->IdProductDetail }}">
                                            {{ $productsq->Size }}
                                            <input type="radio" class="nsizeradio" name="Size" value="{{ $productsq->Size }}" required>
                                            <input type="hidden" name="soluongconlai" value="{{ $soluongconlai }}">
                                        </li>
                                        
                                    @endforeach
                                @endforeach
                            </ul>
                            <span>Quantity:</span>
                            <input type="number" name="Quantity" min="1" class="form-control" style="width: 60px;" required>
                        </ul>
                        <div class="clear"> </div>
                    </ul>
                    <input type="submit" class="btn btn-danger addtocart" value="ADD TO CART">
                </form>
                    <ul class="product-share">
                        <h3>All so Share On</h3>
                        <ul>
                            <li><a class="share-face" href="#"><span> </span> </a></li>
                            <li><a class="share-twitter" href="#"><span> </span> </a></li>
                            <li><a class="share-google" href="#"><span> </span> </a></li>
                            <li><a class="share-rss" href="#"><span> </span> </a></li>
                            <div class="clear"> </div>
                        </ul>
                    </ul>
                </div>
            </div>
            </div>
            <div class="clear"> </div>
        </div>
        </div>
    </div>
</div>
<script src="customer_assets/js/owl.carousel.js"></script>
<script src="customer_assets/js/jquery.etalage.js"></script>
<script src="customer_assets/js/nhatslider.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var imglarge;
    $('.etalage_thumb').each(function() {
        imglarge = $(this).find('.etalage_source_image').attr('src');
        $(this).find('.etalage_thumb_image').attr('src', imglarge);
    });
});
</script>