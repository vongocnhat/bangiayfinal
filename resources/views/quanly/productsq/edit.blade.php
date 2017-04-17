@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill in a form</h5>
    </div>
    <div class="panel-body">
      {!! Form::model($productsq, ['method' => 'put' ,'route' => ['productsq.update', $productsq->id], 'class' => 'form-horizontal']) !!}
        <div class="control-group">
          <label class="control-label required">IdProductDetail: </label>
          <div class="controls">
            <select class="form-control" name="IdProductDetail">
              @foreach($productdetails as $productdetail)
                <option @if($productdetail->id == $productsq->IdProductDetail) selected @endif>{{ $productdetail->id }}</option>
              @endforeach
            </select>
          </div>
        </div>  
        <div class="control-group">
          <label class="control-label required">Size: </label>
          <div class="controls">
            <input type="number" name="Size" class="form-control" required value="{{ $productsq->Size }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Quantity: </label>
          <div class="controls">
            <input type="number" name="Quantity" class="form-control" value="{{ $productsq->Quantity }}" />
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" class="btn btn-primary btn-large" value="Save">
          <a href="{{ route('productsq.index') }}" class="btn btn-danger" style="margin-left: 50px;">Cancel</a>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop