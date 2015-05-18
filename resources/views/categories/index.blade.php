@extends('app')

@section('content')
	<div class="container">
		
		<h1>Categories</h1>

		<div class="row ">
			<div class="col-md-12">
				<a href="{{ route('category_create') }}" class="btn btn-success btn-md">Add New Category</a>
			</div>
		</div>

		<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th width="10%" scope="col" align="left">ID</th>
				<th width="30%" scope="col" align="left">Name</th>
				<th width="45%" scope="col" align="left">Description</th>
				<th width="15%" scope="col" align="right">&nbsp;</th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td width="10%">{{ $category->id }}</td>
				<td width="30%">{{ $category->name }}</td>
				<td width="45%">{{ $category->description }}</td>
				<td width="15%" align="right">
					<a href="{{ route('category_edit', ['id' => $category->id]) }}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{ route('category_delete', ['id' => $category->id]) }}" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>

		<div class="text-center">
			{!! $categories->render(); !!}
		</div>
		
	</div>
@endsection