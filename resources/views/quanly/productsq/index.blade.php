@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <a href="{{route('productsq.create')}}"><button type="button" class="btn btn-primary">Create Product Size And Quantity</button></a>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Product Size And Quantity</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>IdProductDetail</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productsqs as $productsq)
            <tr class="gradeX">
              <td>{{ $productsq->IdProductDetail }}</td>
              <td>{{ $productsq->Size}}</td>
              <td>{{ $productsq->Quantity }}</td>
              <td>{{ $productsq->created_at }}</td>
              <td>{{ $productsq->updated_at }}</td>
              <td><a href="{{ route('productsq.edit', ['id'=>$productsq->id]) }}" class="btn btn-info" >Edit</a></td>
              <td>
              {!! Form::open(['method' => 'delete', 'action' => ['ProductSQController@destroy', $productsq->id]]) !!}
              {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Product Size And Quantity: '+'$productsq->Name')", 'class' => 'btn btn-danger']) !!}
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