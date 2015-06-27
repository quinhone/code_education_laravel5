@extends('store.store')

@section('content')

    <div class="container" >
        @if($cart == 'empty')
        <h1 class="text-center">Seu carrinho está vazio.</h1>
        @else
        <h1 class="text-center">O pedido #{{ $order->id }} foi gerada com sucesso...</h1>
        @endif
    </div>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ Request::root() }}/extensions/toastmessage/res/css/jquery.toastmessage.css"/>
@stop
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/js/angularjs/app.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/js/angularjs/cartController.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/extensions/toastmessage/js/jquery.toastmessage.min.js"></script>
@stop
