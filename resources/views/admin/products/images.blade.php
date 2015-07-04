@extends('app')

@section('content')
	<div class="container">
		
		<h1>Images of {{ $product->name }}</h1>

		<div class="row ">
			<div class="col-md-12 btn-crud">
				<a href="{{ route('products_images_create', [ 'id' => $product->id ]) }}" class="btn btn-success btn-md">Add New Image</a>
			</div>
		</div>

		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th scope="col" align="left">ID</th>
				<th scope="col" align="left">Image</th>
				<th scope="col" align="left">Extension</th>
				<th scope="col" align="right">&nbsp;</th>
			</tr>
			@foreach($product->images as $image)
			<tr>
				<td >{{ $image->id }}</td>
				<td >
                    <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" alt="" height="80"/>
                </td>
				<td >{{ $image->extension }}</td>
				<td align="right">
					<a href="{{ route('products_images_destroy', ['id' => $image->id]) }}" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
        
        <div class="pull-right">
            <a href="{{ route('products_index') }}" class="btn btn-primary">Ver Produtos</a>
        </div>

		<div class="text-center">

		</div>

		
	</div>
@endsection