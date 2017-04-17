{{-- @extends('layout.layout')
@section('css') --}}
{{--     <link href="customer_assets/css/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="customer_assets/css/etalage.css"> --}}
{{-- @stop
@section('content') --}}
<div class="content details-page">
    <!--start-product-details-->
    <div class="product-details">
        <div class="wrap">
            <ul class="product-head">
                <li><a href="#">Home</a> <span>::</span></li>
                <li class="active-page"><a href="#">Product Page</a></li>
                <div class="clear"> </div>
            </ul>
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
                    <ul class="product-colors">
                        <h3>available Colors ::</h3>
                        <li><a class="color1" href="#"><span> </span></a></li>
                        <li><a class="color2" href="#"><span> </span></a></li>
                        <li><a class="color3" href="#"><span> </span></a></li>
                        <li><a class="color4" href="#"><span> </span></a></li>
                        <li><a class="color5" href="#"><span> </span></a></li>
                        <li><a class="color6" href="#"><span> </span></a></li>
                        <li><a class="color7" href="#"><span> </span></a></li>
                        <li><a class="color8" href="#"><span> </span></a></li>
                        <div class="clear"> </div>
                    </ul>
                    <ul class="product-qty">
                        <span>Quantity:</span>
                        <select>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </ul>
                    <a href="{{ route('cusproduct.cart', $product->id) }}" data-name = '{{ $product->Name }}' data-image = '{{ $product->Image }}' data-price = '{{ $product->Price }}' class="addtocart btn btn-danger">ADD TO CART</a>
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
{{-- @stop
@section('script')
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
@stop --}}