// JavaScript Document - Controller Carrinho de Compras - AngularJS
app.controller('cartController', function cartController($scope, $http, $window) {

    var $ = jQuery;

    $scope.excluir = function(item)
    {
        var confirm = $window.confirm('Tem certeza que deseja retirar o produto "'+item.name+'" do carrinho?');
        if(confirm)
        {
            $http.delete('/cart/destroy/'+item.id).success(function(data)
            {
                if(data.success)
                {
                    var index = $scope.itens.indexOf(item);
                    $scope.itens.splice(index, 1);
                    if($scope.itens.length == 0)
                    {
                        $().toastmessage('showToast', {
                            text     : 'Não há itens no seu Carrinho de Compras.',
                            position : 'middle-center',
                            type     : 'notice',
                            closeText: ''
                        });
                    }
                }
            });
        }
    }

    $scope.atualizar = function(item)
    {
        $http.get('/cart/updCesta/'+item.id+'/'+item.qtd).success(function(data)
        {
                init();
        });
    }

   var getTotal = function()
    {
        $http.get('/cart/getValorTotal').success(function(data)
        {
            var total =  parseFloat(data).toFixed(2);
            if(data)
            {
                $scope.total = total;
            }
        }, 'json');
    }

    var init = function()
    {
        $http.get('/cart/getCesta/').success(function(data)
        {
            if(data.success == 'false')
            {
                $().toastmessage('showToast', {
                    text     : 'Não há itens no seu Carrinho de Compras.',
                    position : 'middle-center',
                    type     : 'notice',
                    close: function() {
                        location.href="/";
                    },
                    closeText: ''
                });


            }
            $scope.itens = data;
            getTotal();

        }, 'json');

    };

    init();

});
