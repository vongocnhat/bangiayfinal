@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-align-justify"></i><h5>Fill in a form</h5>
    </div>
    <div class="panel-body">    
    {!! Form::open(['route' => 'category.store', 'class' => 'form-horizontal']) !!}               
        <div class="control-group">
          <label class="control-label required">Name: </label>
          <div class="controls">
            <input type="text" name="Name" class="form-control" id='Name' required value="{{ old('Name') }}" />
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
@section('script')
<script>
  $(document).ready(function(){
    var name = document.getElementById('Name');
    checkname();
    function checkname()
    {
      if(name.value != '')
      {
        var str = "{{ route('category.validate', ['id' => 0, 'name' => '']) }}"+'/'+name.value;
        $.get(str, function(data){
          name.setCustomValidity(data);
        });
      }
    }
    name.onkeyup = checkname;
  });
</script>
@stop