@extends('layout.layout')
@section('content')



<div class="clear"> </div>

<div class="content">
{{-- @include('layout.slider') --}}
    <div class="wrap" style="width: 100%;">
        <div class="toolbox">
            Số lượng sản phẩm:
            <select id="numpage">
                <option>12</option>
                <option>24</option>
                <option>48</option>
                <option>96</option>
                <option>All</option>
            </select>
            
        </div>
        <div class="content-right">
            <div class="product-grids">    
                {{--product list--}}
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>
@stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $('body').on('click', '.pagination li a', function(e) {
                var url = $(this).attr('href');
                ajaxhtml('.product-grids', url, e);
            });            

            $("#numpage").change(function(e){
                var url = '{{ route('cusproduct.pagination', ['id' => '']) }}'+'/'+this.value;
                ajaxhtml('.product-grids', url, e);
            });
            $("#numpage").change();
        });
    </script>
@stop