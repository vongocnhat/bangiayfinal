@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill Information Admin</h5>
    </div>
    <div class="panel-body">
    {!! Form::open(['route' => 'admin.store', 'class' => 'form-horizontal']) !!}
        <div class="control-group">
          <label class="control-label required">Name: </label>
          <div class="controls">
            <input type="text" name="Name" class="form-control" required value="{{ old('Name') }}" autofocus />
          </div>
        </div>
        
        <div class="control-group">
          <h2>Imformation Login</h2>
        </div>        
        <div class="control-group">
          <label class="control-label required">User: </label>
          <div class="controls">
            <input type="text" name="User" class="form-control" required value="{{ old('User') }}" id="taikhoan" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Password: </label>
          <div class="controls">
            <input type="password" class="form-control" name="password" id="pwd" required value="{{ old('password') }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Confirm Password: </label>
          <div class="controls">
            <input type="password" class="form-control" name="Confirmpassword" id="pwd2" required value="{{ old('Confirmpassword') }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Is Active: </label>
          <div class="controls">
              <input type="checkbox" class="form-control" name="IsActive" checked>
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" class="btn btn-primary btn-large" value="Save">
          <a href="{{ route('category.index') }}" class="btn btn-danger" style="margin-left: 50px;">Cancel</a>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop