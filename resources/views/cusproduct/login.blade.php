@extends('layout.layout')
@section('content')
<div class="ncontent">
<div class="content login-box">
	<div class="login-main">
		<div class="wrap">
			<h1>LOGIN OR CREATE AN ACCOUNT</h1>
			<div class="login-left">
				<h3>NEW CUSTOMERS</h3>
				<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				<a class="acount-btn" href="{{ route('cusproduct.signup') }}">Creat an Account</a>
			</div>
			<div class="login-right">
				<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				@if(session('notify'))
	                <div class="alert alert-danger">
	                    {{ session('notify') }}
	                </div>
                @endif
                {!!Form::open(['route' => 'cusproduct.login', 'method' => 'POST','class' => 'form-horizontal'])!!}
					<div>
						<span>User<label>*</label></span>
						<input type="text" name="User" placeholder="User" class="form-control"> 
					</div>
					<div>
						<span>Password<label>*</label></span>
						<input type="password" name="password" class="form-control" placeholder="Password"> 
					</div>
		{{-- 			<a class="forgot" href="#">Forgot Your Password?</a> --}}
					<input type="submit" value="Login" />
				{!!Form::close()!!}
			</div>
			<div class="clear"> </div>
		</div>
	</div>
</div>
</div>
@stop