@extends('app')

@section('content')
	<div class="container">
		
		<h1>Products</h1>

		<div class="row ">
			<div class="col-md-12">
				<a href="{{ route('products_create') }}" class="btn btn-success btn-md">Add New Product</a>
			</div>
		</div>

		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th width="5%" scope="col" align="left">ID</th>
				<th width="25%" scope="col" align="left">Name</th>
				<th width="25%" scope="col" align="left">Description</th>
				<th width="10%" scope="col" align="center">Featured</th>
				<th width="10%" scope="col" align="center">Recommend</th>
				<th width="10%" scope="col" align="right">Price</th>
				<th width="15%" scope="col" align="right">&nbsp;</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td width="5%">{{ $product->id }}</td>
				<td width="25%">{{ $product->name }}</td>
				<td width="25%">{{ $product->description }}</td>
				<td width="10%" align="center">@if ($product->featured === '1') Sim @else Não @endif</td>
				<td width="10%" align="center">@if ($product->recommend === '1')  Sim @else Não @endif</td>
				<td width="10%" align="right">{{ $product->price }}</td>
				<td width="15%" align="right">
					<a href="{{ route('products_edit', ['id' => $product->id]) }}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{ route('products_delete', ['id' => $product->id]) }}" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>

		
	</div>
@endsection