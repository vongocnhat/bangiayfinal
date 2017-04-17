@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <a href="{{route('customer.create')}}"><button type="button" class="btn btn-primary">Create Customer</button></a>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Customer</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>City</th>
            <th>Ward</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>User</th>
            <th>Balance</th>
            <th>Account Number</th>
            <th>Is Active</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Delete</th>            
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $customer)
            <tr class="gradeX">
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->Name }}</td>
            <td>{{ $customer->Gender ? 'Male' : 'Female' }}</td>
            <td>{{ $customer->Birthday }}</td>
            <td>{{ $customer->City }}</td>
            <td>{{ $customer->Ward }}</td>
            <td>{{ $customer->Address }}</td>
            <td>{{ $customer->Phone }}</td>
            <td>{{ $customer->Email }}</td>
            <td>{{ $customer->User }}</td>
            <td>{{ $customer->Balance }}</td>
            <td>{{ $customer->AccountNumber }}</td>
            <td>{{ $customer->IsActive ? 'True' : 'False' }}</td>
            <td>{{ $customer->created_at }}</td>
            <td>{{ $customer->updated_at }}</td>
            <td><a href="{{ route('customer.edit', ['id'=>$customer->id]) }}" class="btn btn-info" >Edit</a></td>
            <td>
            {!! Form::open(['method' => 'delete', 'action' => ['CustomerController@destroy', $customer->id]]) !!}
            {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Customer: '+'$customer->Name')", 'class' => 'btn btn-danger']) !!}
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