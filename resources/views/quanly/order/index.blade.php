@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Order</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>Ward</th>
            <th>Address</th>
            <th>Method</th>
            <th>Total Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Create At</th>
            <th>Update At</th>
            <th>Detail</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr class="gradeX">
              <td>{{ $order->id }}</td>
              <td>{{ $order->Name }}</td>
              <td>{{ $order->Email }}</td>
              <td>{{ $order->Phone }}</td>
              <td>{{ $order->City }}</td>
              <td>{{ $order->Ward }}</td>
              <td>{{ $order->Address }}</td>
              <td>{{ $order->Method }}</td>
              <td>{{ $order->TotalQuantity }}</td>
              <td>{{ $order->TotalPrice }}</td>
              <td>{{ $order->Status == 0 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán' }}</td>
              <td>{{ $order->created_at }}</td>
              <td>{{ $order->updated_at }}</td>
              <td><a href="{{ route('order.show', $order->id) }}" class="btn btn-primary" >Detail</a></td>
              <td>
              {!! Form::open(['method' => 'delete', 'action' => ['OrderController@destroy', $order->id]]) !!}
              {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Order: ' + '$order->id' + ' All Order Detail In ' + '$order->id' + ' Will Be Delete')", 'class' => 'btn btn-danger']) !!}
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