@extends('quanly.layoutadmin.layoutadmin')
@section('content')
<div class="col-lg-12">
  <a href="{{route('product.create')}}"><button type="button" class="btn btn-primary">Create Product</button></a>
  <div class="panel panel-default">
    <div class="panel-heading">
      <i class="fa fa-table"></i><h5>List Product</h5>
    </div>
    <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Name</th>
            <th>Best Seller</th>
            <th>Most Viewed</th>
            <th>Price</th>
            <th>Price Promotion</th>
            <th>Image</th>
            <th>Description</th>
            <th>Total Detail</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit</th>
            <th>Details</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr class="gradeX">
              <td>{{ $product->id }}</td>
              <td>{{ $product->Category->Name }}</td>
              <td>{{ $product->Name }}</td>
              <td>{{ $product->BestSeller }}</td>
              <td>{{ $product->MostViewed }}</td>
              <td>{{ $product->Price }}</td>
              <td>{{ $product->PricePromotion }}</td>
              @if(isset($product->ProductDetail->First()->Image))
                <td>{{ $product->ProductDetail->First()->Image }}</td>
              @else
                <td></td>
              @endif
              <td>{{ $product->Description }}</td>
              {{-- //bi sai --}}
              <?php $TotalQuantity = 0; ?>
              @foreach($product->ProductDetail as $productdetail)
                @foreach($productdetail->ProductSQ as $productsq)
                  <?php $TotalQuantity += $productsq->Quantity; ?>
                @endforeach
              @endforeach
              <td>{{ $TotalQuantity }}</td>
              <td>{{ $product->created_at }}</td>
              <td>{{ $product->updated_at }}</td>
              <td><a href="{{ route('product.edit', ['id'=>$product->id]) }}" class="btn btn-info" >Edit</a></td>
              <td><a href="{{ route('product.show', ['id'=>$product->id]) }}" class="btn btn-primary" >Details</a></td>
              <td>
              {!! Form::open(['method' => 'delete', 'action' => ['ProductController@destroy', $product->id]]) !!}
              {!! Form::submit('Delete', ['onclick'=>"return confirm('Delete Product: '+'$product->Name')", 'class' => 'btn btn-danger']) !!}
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