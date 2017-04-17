<?php
	session_start();
	$totalquantity = 0;
	$totalpay = 0;
 ?>
@if(!empty($_SESSION["productdetails"]))
@foreach($_SESSION["productdetails"] as $key => $productdetail)
<tr data-idproductsq="{{ $key }}">
	<td>{{ $productdetail['Name'] }}</td>
	<td style="width: 80px; height: 80px;"><img src="admin_assets/productimages/{{ $productdetail['Image'] }}" style="width: 100%; height: 100%;" /></td>
	<td class="proprice">{{ $productdetail['Price'] }}</td>
	<td class="Size">{{ $productdetail['Size'] }}</td>
	<td><input type="number" name="quantity" value="{{ $productdetail['Quantity'] }}" max="{{ $productdetail['InStock'] }}" min="1" step="1" style="width: 50px;"></td>
	<td class="total">{{ $productdetail['Price']*$productdetail['Quantity'] }}</td>
	<td style="width: 35px;"><input type="button" class="btn btn-danger deleteproductincart" value="X"></td>
	<?php
		$totalquantity += $productdetail['Quantity'];
		$totalpay += $productdetail['Price']*$productdetail['Quantity'];
	?>
</tr>
@endforeach
@endif
@if(!empty($_SESSION["productdetails"]))
	<tr style="height: 36px;">
		<td style="position: relative;"><input type="submit" value="Pay" class="btn btn-success" style="position: absolute; top:0; right: 0;bottom: 0; left: 0; width: 100%;"></td>
		<td></td>
		<td></td>
		<td class="totalquantity">Total Quantity: <span>{{ $totalquantity }}</span></td>
		<td class="totalpay">Total Pay: <span>{{ $totalpay }}</span></td>
		<td></td>
	</tr>
@endif