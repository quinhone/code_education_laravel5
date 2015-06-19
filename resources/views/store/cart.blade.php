@extends('store.store')

@section('content')

    <section id="cart_items" ng-controller="cartController">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr class="cart_menu">
                            <th class="img">Image</th>
                            <th class="description">Name</th>
                            <th class="price text-right">Price</th>
                            <th class="qtd text-center">Qtd</th>
                            <th class="total text-right">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr ng-repeat="un in itens">
                            <td class="cart-product">
                                <img src="{{ url('uploads')}}/[[un.img]]" alt="" width="60" />
                            </td>
                            <td class="cart-name"><a href="{{  Request::root() }}/[[un.id]]">[[un.name]]</a></td>
                            <td class="cart-price text-right">R$ [[un.price]]</td>
                            <td class="cart-qtd text-center">
                                <input type="text" name="produto['[[un.id]]']" value="[[un.qtd]]" ng-model="un.qtd" ng-change="atualizar(un)" size="2">
                            </td><!--  $item['qtd']  -->
                            <td class="cart-total text-right"> [[ un.price * un.qtd | currency : "R$" : 2   ]]</td>
                            <td class="cart-delete"><button class="btn btn-danger btn-sm pull-right" ng-click="excluir(un)">Excluir</button></td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td class="total-cart text-right">TOTAL: R$ [[ total ]]</td>
                            <td></td>
                        </tr>

                    <tr class="cart_menu">
                        <td colspan="6">
                                <a href="{{ url('/') }}" class="btn btn-warning pull-left"> Continuar Comprando</a>
                                <a href="" class="btn btn-success pull-right" ng-click="goToCheckout()"> Finalizar Compra</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
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
