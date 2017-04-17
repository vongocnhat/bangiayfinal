    @for($i = 0 ; $i < count($products) ; $i++)
<a href='{{ route('cusproduct.show', $products[$i]->id) }}' class="product" style="color: black;" >
        <div class="product-grid fade" style=" outline: 1px solid #EEE;">
            <div class="product-pic">
                <span>
                    @if(isset($products[$i]->ProductDetail->First()->Image))
                        <img src="admin_assets/productimages/{{ $products[$i]->ProductDetail->First()->Image }}" title="{{ $products[$i]->Description }}" class="nimage" />
                    @endif
                </span>       
            </div>
            <div class="product-info">               
                <div class="product-info-price">
                    @if($products[$i]->PricePromotion > 0)
                        <span style="font-size: 15px; color: #F00; float: left;">{{ $products[$i]->PricePromotion }} VND</span>
                        <span ><del style="float: right; font-size: 13px;">{{ $products[$i]->Price }} VND</del></span>                   
                    @else
                        <span style="float: left; font-size: 15px; color: #F00;">{{ $products[$i]->Price }} VND</span>
                    @endif
                </div>
                 <div class="product-info-cust">
                    <span style="font-size: 13px;" title="{{ $products[$i]->Name }}">{{ $products[$i]->Name }}</span><br>
                    <i class="fa fa-eye" title="Đã có {{ $products[$i]->MostViewed }} lượt xem"> {{ $products[$i]->MostViewed }}</i>
                    <i class="fa fa-shopping-cart" title="Đã có {{ $products[$i]->BestSeller }} lượt mua"> {{ $products[$i]->BestSeller }}</i>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
</a>
    @endfor
    <div class="containpagination">
    @if(!isset($all))
        {{ $products->links() }}
    @endif
    </div>
        <div class="clear"> </div>