@extends('app')

@section('content')
	<div class="container">
		
		<h1>Upload Image</h1>

		@if($errors->any())
			<ul class="alert">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['route' =>[ 'products_images_store', $product->id ], 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}

		<div class="form-group">
			{!! Form::label('image','Image:') !!}
			{!! Form::file('image',  null, ['class' => 'btn btn-default']) !!}
		</div>

		<div class="form-group">
                    {!! Form::submit('Upload Image', ['class' => 'btn btn-primary pull-left']) !!}
                    <a href="javascript:history.back(1);" class="btn btn-default voltar">Back</a>
		</div>
		{!! Form::close() !!}

	</div>
@endsection