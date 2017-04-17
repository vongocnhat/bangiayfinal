@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Order Detail</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Id Order</th>
            <th>Id Product Detail</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orderdetails as $orderdetail)
            <tr class="gradeX">
                <td>{{ $orderdetail->id }}</td>
                <td>{{ $orderdetail->Order->id }}</td>
                <td>{{ $orderdetail->ProductDetail->id }}</td>
                <td>{{ $orderdetail->ProductDetail->Product->Name }}</td>
                <td>{{ $orderdetail->ProductDetail->Product->Price }}</td>
                <td>{{ $orderdetail->Quantity }}</td>
                <td>{{ $orderdetail->created_at }}</td>
                <td>{{ $orderdetail->updated_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop