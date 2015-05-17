@extends('app')

@section('content')
	<div class="container">
		
		<h1>Create New Product</h1>

		@if($errors->any())
			<ul class="alert">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['url' => 'admin/products/add']) !!}		
		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('price','Price:') !!}
			{!! Form::text('price', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-3">
	            {!! Form::label('Reatured ?') !!}
	            {!! Form::radio('featured', 1, ['class' => 'form-control']) !!} Yes
	            {!! Form::radio('featured', 0, ['class' => 'form-control']) !!} No
				</div>
				<div class="col-md-9">
	            {!! Form::label('Recommend ?') !!}
	            {!! Form::radio('recommend', 1, ['class' => 'form-control']) !!} Yes
	            {!! Form::radio('recommend', 0, ['class' => 'form-control']) !!} No
				</div>
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Add New Category', ['class' => 'btn btn-success pull-right']) !!}
		</div>
		{!! Form::close() !!}

	</div>
@endsection