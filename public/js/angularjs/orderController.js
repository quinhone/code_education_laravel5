// JavaScript Document - Controller Carrinho de Compras - AngularJS
app.controller('orderController', function orderController($scope, $http, $window) {

    var $ = jQuery;

    $scope.onChangeSelect = function (id)
    {

        var status = $("option:selected").val();

        if(status !== '0')
        {

            $http.get('/admin/orders/atualizaStatus/'+status+'/'+id).success(function(data)
            {
                if(data.success)
                {
                    $('.status'+id).html($('#escolhastatus'+id+' option:selected').text());
                }

            }, 'json');
        }
            
    };
    
    $scope.onChangeStatus = function (id, msg)
    {

        $('.status'+id).html(msg);
            
    };
    
    $scope.editStatus = function(id)
    {
        $scope.resposta = 'Status editado com sucesso!!';
        var statesdemo = {
            state0: {
                html:'<fieldset class="form-horizontal"><div class="form-group"><div class="col-md-12">'+
'<select id="escolhastatus" name="escolhastatus" class="form-control">'+''+
'<option value="0" selected="selected" label="Selecione para alterar status do pedido...">Selecione para alterar status do pedido...</option>'+
'<option value="1" label="Aguardando Pagamento">Aguardando Pagamento</option>'+
'<option value="2" label="Pedido Faturado">Pedido Faturado</option>'+
'<option value="3" label="Pedido Encaminhado">Pedido Encaminhado</option>'+
'<option value="4" label="Pedido Entregue">Pedido Entregue</option>'+
'</select></div></div>',
                buttons: { Cancelar: false, Salvar: true },
                focus: 1,
                submit:function(e,v,m,f)
                {
                    var e = "";

console.log(v);
console.log(e);
                    if(v)
                    {
                        if (e === "")
                        {
                            var status = $("option:selected").val();
                            var msg = $('#escolhastatus option:selected').text();

                            $http.get('/admin/orders/atualizaStatus/'+status+'/'+id).success(function(data)
                            {
                                if(data.success)
                                {
                                    $scope.onChangeStatus(id, msg);
                                    $.prompt.goToState('state1');
                                    $('.jqiform')[0].reset();
                                    return false;
                                }
                                else
                                {
                                    $.prompt.goToState('state2');
                                    return false;
                                }
                            }, 'json');

                        }
                        else{
                            $('<div class="errorBlock" style="display: none;">'+ e +'</div>').prependTo(m).show('slow');
                        }
                        return false;

                    }
                    else return true;

                }
            },
            state1: {
                html: '<p class="mensagem-success">Status alterado com sucesso!</p>',
                buttons: { Voltar: -1, Fechar: 0 },
                focus: 1,
                submit:function(e,v,m,f){
                    e.preventDefault();
                    if(v===0)
                        $.prompt.close();
                    else if(v===-1)
                        $.prompt.goToState('state0');
                }
            },
            state2: {
                html: '<p class="mensagem-erro">Erro ao editar Status, tente novamente!</p>',
                buttons: { Voltar: -1, Fechar: 0 },
                focus: 1,
                submit:function(e,v,m,f){
                    e.preventDefault();
                    if(v===0)
                        $.prompt.close();
                    else if(v===-1)
                        $.prompt.goToState('state0');
                }
            }
        };
        
        $.prompt(statesdemo);
    };

    var init = function ()
    {
        //$scope.tipoStatus = $scope.tiposStatus[0];
    };

    $scope.tiposStatus = [
        {status: 'Selecione para alterar status do pedido...', value: '0'},
        {status: 'Aguardando Pagamento', value: '1'},
        {status: 'Pedido Faturado', value: '2'},
        {status: 'Pedido Encaminhado', value: '3'},
        {status: 'Pedido Entregue', value: '4'}
    ];

    init();
});
