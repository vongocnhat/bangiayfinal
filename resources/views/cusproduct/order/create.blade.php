@extends('layout.layout')
@section('content')
{!! Form::open(['route' => 'order.store', 'class' => 'form-horizontal', 'onsubmit'=>'return check()']) !!}
	<div class="register-top-grid">
		<h3>PERSONAL INFORMATION</h3>
		<div>
			<span>Name<label>*</label></span>
			<input type="text" name="Name" required class="form-control" value="{{ old('Name') }}"> 
		</div>							
		<div>
			<span>Email Address<label>*</label></span>
			<input type="email" name="Email" required class="form-control" value="{{ old('Email') }}"> 
		</div>
		<div>
			<span>Phone<label>*</label></span>
			<input type="number" name="Phone" required class="form-control" value="{{ old('Phone') }}"> 
		</div>
		<div>
			<span>City<label>*</label></span>
			<input type="text" name="City" required class="form-control" value="{{ old('City') }}"> 
		</div>
		<div>
			<span>Ward<label>*</label></span>
			<input type="text" name="Ward" required class="form-control" value="{{ old('Ward') }}"> 
		</div>
		<div>
			<span>Address<label>*</label></span>
			<input type="text" name="Address" required class="form-control" value="{{ old('Address') }}"> 
		</div>
	</div>
	<div class="clear"> </div>
	<input type="submit" value="Continue" name="submit" class="btn btn-success" style="margin: 0 20px 0 8px;" />
	<a href="{{ route('cusproduct.index') }}" class="btn btn-danger" style="margin-right: 20px;">Cancel</a>
	<input type="reset" value="Delete All Imformation" class="btn btn-primary">
{!! Form::close() !!}
@stop
@section('script')
<script type="text/javascript">
	function check(){
        var price = document.Test.txt_gia.value;
        
        if (price < 2000) {
        
        alert('Minimum amount is 2000 VNĐ');
        return false;
        }
        
    return true;
	}
	@if(Auth::guard('customers')->check())
		$('input[name="Name"]').val('{{ Auth::guard('customers')->user()->Name }}');
		$('input[name="Email"]').val('{{ Auth::guard('customers')->user()->Email }}');
		$('input[name="Phone"]').val('{{ Auth::guard('customers')->user()->Phone }}');
		$('input[name="City"]').val('{{ Auth::guard('customers')->user()->City }}');
		$('input[name="Ward"]').val('{{ Auth::guard('customers')->user()->Ward }}');
		$('input[name="Address"]').val('{{ Auth::guard('customers')->user()->Address }}');
	@endif
</script>
@stop