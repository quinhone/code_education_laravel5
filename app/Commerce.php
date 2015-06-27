<?php

namespace CodeCommerce;


class Commerce
{
    private static $status;
    
    public static function checkStatus($status)
    {
        switch ($status)
        {
            case 1:
                self::$status = 'Aguardando Pagamento';
                break;
            case 2:
                self::$status = 'Pedido Faturado';
                break;
            case 3:
                self::$status = 'Pedido Encaminhado';
                break;
            case 4:
                self::$status = 'Pedido Entregue';
                break;
            default:
                self::$status = 'Aguardando Pagamento';    
        }
        
        return self::$status;
    }
}
