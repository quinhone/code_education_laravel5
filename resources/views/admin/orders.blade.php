@extends('app')

@section('content')
<div class="col-md-12" ng-controller="orderController">
    <h1>Pedidos</h1>
    <div class="panel-group" id="accordion">
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="col-md-10">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $order->id}}" >
                            <ul>
                                <li><strong>Pedido nº.</strong>{{ $order->id}} -</li>
                                <li><strong>Data:</strong> {{ $order->created_at}}</li>
                                <li class="pull-right status"><strong>Status:</strong> <span class="status{{$order->id}} status-pedido">{{ $comm::checkStatus($order->status) }}</span></li>
                            </ul>
                        </a>
                    </h4>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success pull-right" ng-click="editStatus({{ $order->id}});">Editar Status</button>
                </div>
            </div>
            <div id="collapse{{ $order->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tbory>
                            <tr>
                                <th>Item</th>
                                <th class="text-center">Qtd</th>
                                <th class="text-right">Valor</th>
                                <th class="text-right">Total</th>

                            </tr>
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name}}</td>
                                <td class="text-center">{{ $item->qtd}}</td>
                                <td class="text-right">{{ $item->price}}</td>
                                <td class="text-right">R$ {{ $item->qtd * $item->price}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right"><strong>Total Pedido: R$ {{ $order->total}}</strong></td>
                            </tr>
                        </tbory>
                    </table>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{ Request::root() }}/extensions/impromptu/jquery-impromptu.min.css" />
@stop

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
<script type="text/javascript" src="{{ Request::root() }}/js/angularjs/app.js"></script>
<script type="text/javascript" src="{{ Request::root() }}/js/angularjs/orderController.js"></script>
<script type="text/javascript" src="{{ Request::root() }}/extensions/impromptu/jquery-impromptu.min.js"></script>
@stop
