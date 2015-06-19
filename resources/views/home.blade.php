@extends('app')

@section('content')
<div class="container">
	<div class="home row">
		  <h1>Hello {{ Auth::user()->name }}, wellcome to CodeCommerce!!</h1>
		  <img src="{{ asset('/img/ecommerce.jpg') }}" alt="">
		</div>
	</div>
</div>
@endsection
