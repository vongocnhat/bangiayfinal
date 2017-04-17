@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <a href="{{route('category.create')}}"><button type="button" class="btn btn-primary">Create Category</button></a>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Categories</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Details</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
            <tr class="gradeX">
              <td>{{ $category->Name }}</td>
              <td>{{ $category->created_at }}</td>
              <td>{{ $category->updated_at }}</td>
              <td><a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-info" >Edit</a></td>
              <td><a href="{{ route('category.show', ['id'=>$category->id]) }}" class="btn btn-primary" >Details</a></td>
              <td>
              {!! Form::open(['method' => 'delete', 'action' => ['CategoryController@destroy', $category->id]]) !!}
              {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Category: ' + '$category->Name' + ' All Product And Product Detail In: ' + '$category->Name' + ' Will Be Delete')", 'class' => 'btn btn-danger']) !!}
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