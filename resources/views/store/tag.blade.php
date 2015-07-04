@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
    <div class="products col-sm-9 padding-right">

        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ $tagname->name  }}</h2>
            @include('store.partial.productsByTag', ['products' => $products])
        </div><!--features_items-->

    </div>
@stop