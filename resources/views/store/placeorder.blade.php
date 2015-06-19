@extends('store.store')

@section('content')

    <div class="container" >
        <h1 class="text-center">A ordem foi gerada com sucesso... Aguarde a próxima etapa do curso</h1>
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
