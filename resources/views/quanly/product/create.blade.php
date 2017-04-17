@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill in a form</h5>
    </div>
    <div class="panel-body">
    {!! Form::open(['route' => 'product.store', 'class' => 'form-horizontal', 'enctype'=> 'multipart/form-data' ]) !!}
        <div class="control-group">
          <label class="control-label required">Category: </label>
          <div class="controls">
            <select class="form-control" name="IdCategory" required>
                <option value="">Select a category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->Name }}</option>
              @endforeach
            </select>
          </div>
        </div>                
        <div class="control-group">
          <label class="control-label required">Name: </label>
          <div class="controls">
            <input type="text" name="Name" class="form-control Name" id='Name' required value="{{ old('Name') }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Price: </label>
          <div class="controls">
            <input type="number" name="Price" class="form-control" required value="{{ old('Price') }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Price Promotion: </label>
          <div class="controls">
            <input type="number" name="PricePromotion" class="form-control" value="{{ old('PricePromotion') }}" />
          </div>
        </div>
        <div class="control-group" style="padding-bottom: 57px;">
          <label class="control-label">Description: </label>
          <div class="controls">
            <textarea rows="3" name="Description" class="form-control" >{{ old('Description') }}</textarea>
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
        var str = "{{ route('product.validate', ['id' => 0, 'name' => '']) }}"+'/'+name.value;
        $.get(str, function(data){
          name.setCustomValidity(data);
        });
      }
    }
    name.onkeyup = checkname;
  });
</script>
@stop