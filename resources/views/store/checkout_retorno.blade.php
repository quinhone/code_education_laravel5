@extends('store.store')

@section('content')

    <div class="container" >

        <h4 class="text-center">Olá <strong> {{ Auth::user()->name }}</strong> sua transação foi efetuada, anote seu TID para futuras consultas</h4>
        <h3 class="text-center">{{ $tid }}</h3>

    </div>

@stop

@section('css')

@stop
@section('scripts')

@stop
