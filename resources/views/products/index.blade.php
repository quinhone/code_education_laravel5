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
				<th scope="col" align="left">ID</th>
				<th scope="col" align="left">Name</th>
				<th scope="col" align="left">Description</th>
				<th scope="col" align="center">Featured</th>
				<th scope="col" align="center">Recommend</th>
				<th scope="col" align="right">Price</th>
				<th scope="col" align="left">Category</th>
				<th scope="col" align="right">&nbsp;</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td >{{ $product->id }}</td>
				<td >{{ $product->name }}</td>
				<td >{{ $product->description }}</td>
				<td align="center">@if ($product->featured === '1') Sim @else Não @endif</td>
				<td align="center">@if ($product->recommend === '1')  Sim @else Não @endif</td>
				<td align="right">{{ $product->price }}</td>
				<td align="left">{{ $product->category->name }}</td>
				<td align="right">
					<a href="{{ route('products_edit', ['id' => $product->id]) }}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{ route('products_delete', ['id' => $product->id]) }}" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>

		<div class="text-center">
			{!! $products->render(); !!}
		</div>

		
	</div>
@endsection