@extends('app')

@section('content')
	<div class="container">
		
		<h1>Categories</h1>

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
					<a href="{{ $category->id }}" class="btn btn-primary btn-xs">Edit</a>
					<a href="{{ $category->id }}" class="btn btn-danger btn-xs">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
		
	</div>
@endsection