@extends('layout.layout')
@section('content')
<div class="ncontent">
<div class="content login-box">
	<div class="login-main">
		<div class="wrap">
			<h1>CREATE AN ACCOUNT</h1>
			@if(session('notify'))
                <div class="alert alert-success">
                    {{ session('notify') }}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                </div>
            @endif
			<div class="register-grids">
				{!! Form::open(['route' => 'cusproduct.signup', 'class' => 'form-horizontal']) !!}
						<div class="register-top-grid">
							<h3>PERSONAL INFORMATION</h3>
							<div>
								<span>Name<label>*</label></span>
								<input type="text" name="Name" class="form-control" required value="{{ old('Name') }}"> 
							</div>							
							<div>
								<span>Gender<label>*</label></span>
								Male: <input type="radio" name="Gender" value="1" required>
								Female: <input type="radio" name="Gender" value="0" required>
							</div>
							<div>
								<span>Birthday<label>*</label></span>
								<input type="date" name="Birthday" class="form-control no-spin" required value="{{ old('Birthday') }}"> 
							</div>
							<div>
								<span>City</span>
								<input type="text" name="City" class="form-control" value="{{ old('City') }}"> 
							</div>
							<div>
								<span>Address</span>
								<input type="text" name="Address" class="form-control" value="{{ old('Address') }}"> 
							</div>
							<div>
								<span>Phone</span>
								<input type="text" name="Phone" class="form-control" value="{{ old('Phone') }}"> 
							</div>
							<div>
								<span>Email Address<label>*</label></span>
								<input type="email" name="Email" class="form-control" required value="{{ old('Email') }}"> 
							</div>
							<div>
								<span>Account Number</span>
								<input type="text" name="AccountNumber" class="form-control" value="{{ old('AccountNumber') }}"> 
							</div>
						</div>
						<div class="clear"> </div>
						<div class="register-bottom-grid">
							<h3>LOGIN INFORMATION</h3>
							<div>
								<span>User<label>*</label></span>
								<input type="text" name="User" class="form-control" required value="{{ old('User') }}"> 
							</div>
							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" class="form-control" id="pwd" required value="{{ old('password') }}">
							</div>
							<div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="confirmpassword" class="form-control" id="pwd2" required value="{{ old('confirmpassword') }}">
							</div>
							<div class="clear"> </div>
						</div>
						<div class="clear"> </div>
						<input type="submit" value="submit" />
						<a href="{{ route('cusproduct.index') }}" class="btn btn-danger" style="margin-left: 20px;">Cancel</a>
				{!! Form::close() !!}
			</div>
		</div>
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
	<script src="admin_assets/myjsandcss/js/myjquery.form_validation.js"></script>
@stop
