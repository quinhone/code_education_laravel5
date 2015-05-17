@extends('app')

@section('content')
	<div class="container">
		
		<h1>Edit Product - {{ $products->name }}</h1>

		@if($errors->any())
			<ul class="alert">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['route' => ['products_update', $products->id], 'method' => 'put']) !!}		
		<div class="form-group">
			{!! Form::label('name','Name:') !!}
			{!! Form::text('name', $products->name, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description:') !!}
			{!! Form::textarea('description', $products->description, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('price','Price:') !!}
			{!! Form::text('price', $products->price, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			<div class="row">
				<div class="col-md-3">
				{!! Form::label('featured', 'Featured:') !!}
				{!! Form::radio('featured', 1, ($products->featured)?true:false, ['class' => 'field']) !!} Yes
				{!! Form::radio('featured', 0, (!$products->featured)?true:false, ['class' => 'field']) !!} No
				</div>
				<div class="col-md-9">
				{!! Form::label('recommend', 'Recommend:') !!}
				{!! Form::radio('recommend', 1, ($products->recommend)?true:false, ['class' => 'field']) !!} Yes
				{!! Form::radio('recommend', 0, (!$products->recommend)?true:false, ['class' => 'field']) !!} No
				</div>
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Save Product', ['class' => 'btn btn-success pull-right']) !!}
		</div>
		{!! Form::close() !!}

	</div>
@endsection