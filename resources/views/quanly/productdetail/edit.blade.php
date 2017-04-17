@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill in a form</h5>
    </div>
    <div class="panel-body">
    {!! Form::model($productdetail, ['method' => 'put' ,'route' => ['productdetail.update', $productdetail->id], 'class' => 'form-horizontal', 'enctype'=> 'multipart/form-data']) !!}
        <div class="control-group">
          <label class="control-label required">Product: </label>
          <div class="controls">
            <select class="form-control" name="IdProduct">
              @foreach($products as $product)
                <option value="{{ $product->id }}" @if($product->id == $productdetail->IdProduct) selected @endif>{{ $product->Name }}</option>
              @endforeach
            </select>
          </div>
        </div>                
        <div class="control-group">
          <label class="control-label required">Image: </label>
          <div class="controls">
              <label class="myFile">
                <input type="text" name="txtImage" value="{{ $productdetail->Image }}" class="form-control">
                <input type="file" name="Image" class="form-control" accept="image/*" />
              </label>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Image2: </label>
          <div class="controls">
            <label class="myFile">
              <input type="text" name="txtImage2" value="{{ $productdetail->Image2 }}" class="form-control">
              <input type="file" name="Image2" class="form-control" accept="image/*" />
            </label>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Image3: </label>
          <div class="controls">
            <label class="myFile">
              <input type="text" name="txtImage3" value="{{ $productdetail->Image3 }}" class="form-control">
              <input type="file" name="Image3" class="form-control" accept="image/*" />
            </label>
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" class="btn btn-primary btn-large" value="Save">
          <a href="{{ route('productdetail.index') }}" class="btn btn-danger" style="margin-left: 50px;">Cancel</a>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop