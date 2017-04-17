@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill Imformation Customer</h5>
    </div>
    <div class="panel-body">    
    {!! Form::model($customer, ['method' => 'put' , 'route' => ['customer.update', $customer->id], 'class' => 'form-horizontal']) !!}               
        <div class="control-group">
          <label class="control-label required">Name: </label>
          <div class="controls">
            <input type="text" name="Name" class="form-control" required value="{{ $customer->Name }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Gender: </label>
          <div class="controls">
            Male: <input type="radio" name="Gender" value="1" checked />
            Female: <input type="radio" name="Gender" value="0" @if(!$customer->Gender) checked @endif />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Birthday: </label>
          <div class="controls">
            <input type="date" name="Birthday" class="form-control no-spin" required value="{{ $customer->Birthday }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">City: </label>
          <div class="controls">
            <input type="text" name="City" class="form-control" value="{{ $customer->City }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Ward: </label>
          <div class="controls">
            <input type="text" name="Ward" class="form-control" value="{{ $customer->Ward }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Address: </label>
          <div class="controls">
            <input type="text" name="Address" class="form-control" value="{{ $customer->Address }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Phone: </label>
          <div class="controls">
            <input type="text" name="Phone" class="form-control" value="{{ $customer->Phone }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Email: </label>
          <div class="controls">
            <input type="email" name="Email" class="form-control" required value="{{ $customer->Email }}" />
          </div>
        </div>        
        <div class="control-group">
          <label class="control-label">Account Number: </label>
          <div class="controls">
            <input type="text" name="AccountNumber" class="form-control" value="{{ $customer->AccountNumber }}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Balance: </label>
          <div class="controls">
            <input type="number" name="Balance" class="form-control" value="{{ $customer->Balance }}" />
          </div>
        </div>
        <div class="control-group">
          <h2>Imformation Login</h2>
        </div>        
        <div class="control-group">
          <label class="control-label required">User: </label>
          <div class="controls">
            <input type="text" name="User" class="form-control" required value="{{ $customer->User }}" id="taikhoan" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Password: </label>
          <div class="controls">
            <input type="password" class="form-control" name="password" id="pwd" placeholder="Fill This To Change Password" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label required">Confirm Password: </label>
          <div class="controls">
            <input type="password" class="form-control" name="Confirmpassword" id="pwd2" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Is Active: </label>
          <div class="controls">
            <input type="checkbox" name="IsActive" class="form-control" checked />
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" class="btn btn-primary btn-large" value="Save">
          <a href="{{ route('customer.index') }}" class="btn btn-danger" style="margin-left: 50px;">Cancel</a>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
@section('css')
  <link rel="stylesheet" type="text/css" href="admin_assets/calendar/css/datepicker.min.css">
@stop
@section('script')
  <script type="text/javascript" src="admin_assets/calendar/js/datepicker.min.js" ></script>
  <script type="text/javascript" src="admin_assets/calendar/js/datepicker.en.js" ></script>
  <script>
        $(document).ready(function(){
            $('input[type="date"]').datepicker({
                language: 'en',
                dateFormat: 'yyyy-mm-dd',
                todayButton: new Date(),
                clearButton: true,
                autoClose: true,
            });
        });
    </script>
@stop