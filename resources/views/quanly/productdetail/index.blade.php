@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <a href="{{route('productdetail.create')}}"><button type="button" class="btn btn-primary">Create Product</button></a>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Product Detail</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Image2</th>
            <th>Image3</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productdetails as $productdetail)
            <tr class="gradeX">
              <td>{{ $productdetail->id }}</td>
              <td>{{ $productdetail->Product->Name }}</td>
              <td>{{ $productdetail->Image }}</td>
              <td>{{ $productdetail->Image2 }}</td>
              <td>{{ $productdetail->Image3 }}</td>
              <td>{{ $productdetail->created_at }}</td>
              <td>{{ $productdetail->updated_at }}</td>
              <td><a href="{{ route('productdetail.edit', ['id'=>$productdetail->id]) }}" class="btn btn-info" >Edit</a></td>
              <td>
              {!! Form::open(['method' => 'delete', 'action' => ['ProductDetailController@destroy', $productdetail->id]]) !!}
              {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Product Detail: '+'$productdetail->Name')", 'class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop