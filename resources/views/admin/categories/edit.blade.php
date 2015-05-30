@extends('app')

@section('content')
	<div class="container">
		
		<h1>Edit Category - {{ $categories->name }}</h1>

		@if($errors->any())
			<ul class="alert">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['route' => ['category_update', $categories->id], 'method' => 'put']) !!}		
		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name', $categories->name, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description', $categories->description, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Save Category', ['class' => 'btn btn-success pull-right']) !!}
		</div>
		{!! Form::close() !!}

	</div>
@endsection