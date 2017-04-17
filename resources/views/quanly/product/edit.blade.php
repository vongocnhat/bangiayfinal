@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill in a form</h5>
    </div>
    <div class="panel-body">
    {!! Form::model($product, ['method' => 'put' ,'route' => ['product.update', $product->id], 'class' => 'form-horizontal', 'enctype'=> 'multipart/form-data']) !!}
        <div class="control-group">
          <label class="control-label required">Category: </label>
          <div class="controls">
            <select class="form-control" name="IdCategory">
              @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->IdCategory) selected @endif>{{ $category->Name }}</option>
              @endforeach
            </select>
          </div>
        </div>                
        <div class="control-group">
          <label class="control-label required">Name: </label>
          <div class="controls">
            <input type="text" name="Name" class="form-control" id="Name" required value="{{ $product->Name }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Price: </label>
          <div class="controls">
            <input type="number" name="Price" class="form-control" required value="{{ $product->Price }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Price Promotion: </label>
          <div class="controls">
            <input type="number" name="PricePromotion" class="form-control" value="{{ $product->PricePromotion }}" />
          </div>
        </div>
        <div class="control-group" style="padding-bottom: 57px;">
          <label class="control-label">Description: </label>
          <div class="controls">
            <textarea rows="3" name="Description" class="form-control" >{{ $product->Description }}</textarea>
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" class="btn btn-primary btn-large" value="Save">
          <a href="{{ route('product.index') }}" class="btn btn-danger" style="margin-left: 50px;">Cancel</a>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
@section('script')
<script>
  $(document).ready(function(){
    var name = document.getElementById('Name');
    checkname();
    function checkname()
    {
      if(name.value != '')
      {
        var str = "{{ route('product.validate', ['id' => $product->id, 'name' => '']) }}"+'/'+name.value;
        $.get(str, function(data){
          name.setCustomValidity(data);
        });
      }
    }
    name.onkeyup = checkname;
  });
</script>
@stop