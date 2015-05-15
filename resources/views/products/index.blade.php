@extends('app')

@section('content')
	<div class="container">
		
		<h1>Products</h1>

		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th width="10%" scope="col" align="left">ID</th>
				<th width="30%" scope="col" align="left">Name</th>
				<th width="35%" scope="col" align="left">Description</th>
				<th width="10%" scope="col" align="right">Price</th>
				<th width="15%" scope="col" align="right">&nbsp;</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td width="10%">{{ $product->id }}</td>
				<td width="30%">{{ $product->name }}</td>
				<td width="35%">{{ $product->description }}</td>
				<td width="10%" align="right">{{ $product->price }}</td>
				<td width="15%" align="right">
					<a href="{{ $product->id }}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{ $product->id }}" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
		
	</div>
@endsection