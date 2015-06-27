@extends('store.store')

@section('content')
<div class="col-md-12">
    <h1>Meus Pedidos</h1>
    <div class="panel-group" id="accordion">
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $order->id }}">
                        <ul>
                            <li><strong>Pedido nº.</strong>{{ $order->id }} -</li>
                            <li><strong>Data:</strong> {{ $order->created_at }} -</li>
                            <li class="pull-right"><strong>Status:</strong> {{ $comm::checkStatus($order->status) }}</li>
                        </ul>
                    </a>
                </h4>
            </div>
            <div id="collapse{{ $order->id }}" class="panel-collapse collapse">
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
                                   <td>{{ $item->product->name }}</td>
                                   <td class="text-center">{{ $item->qtd }}</td>
                                   <td class="text-right">{{ $item->price }}</td>
                                   <td class="text-right">R$ {{ $item->qtd * $item->price }}</td>
                               </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total Pedido: R$ {{ $order->total }}</strong></td>
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
<link rel="stylesheet" type="text/css" href="{{ Request::root() }}/extensions/toastmessage/res/css/jquery.toastmessage.css"/>
@stop
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
<script type="text/javascript" src="{{ Request::root() }}/js/angularjs/app.js"></script>
<script type="text/javascript" src="{{ Request::root() }}/js/angularjs/cartController.js"></script>
<script type="text/javascript" src="{{ Request::root() }}/extensions/toastmessage/js/jquery.toastmessage.min.js"></script>
@stop
