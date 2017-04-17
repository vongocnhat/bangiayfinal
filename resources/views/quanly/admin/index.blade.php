@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <a href="{{ route('admin.create') }}"><button type="button" class="btn btn-primary">Create Admin</button></a>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Admin</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User</th>
            <th>Is Active</th>            
            <th>Create At</th>
            <th>Update At</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($admins as $admin)
            <tr class="gradeX">
              <td>{{ $admin->id }}</td>
              <td>{{ $admin->Name }}</td>
              <td>{{ $admin->User }}</td>
              <td>{{ $admin->IsActive ? 'True' : 'False'}}</td>
              <td>{{ $admin->created_at }}</td>
              <td>{{ $admin->updated_at }}</td>
              <td><a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-info" >Edit</a></td>
              <td>
              {!! Form::open(['method' => 'delete', 'action' => ['AdminController@destroy', $admin->id]]) !!}
              {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Admin: '+'$admin->Name')", 'class' => 'btn btn-danger']) !!}
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