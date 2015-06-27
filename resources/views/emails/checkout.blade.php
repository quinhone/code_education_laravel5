<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; " />
        <title>Code Commerce</title>
    </head>

    <body>
        <table style="font-family:Arial, Helvetica, sans-serif; border:1px solid #CCC;" cellpadding="0" cellspacing="0" border="0" width="800" align="center">
            <tr bgcolor="#272829">
                <td bgcolor="#272829">
                    <h1>Code Commerce</h1>
                </td>
            </tr>
            <tr>
                <td  style="font-size:20px; font-weight:600; padding:20px 0 10px 10px;">
                    Prezado(a) {{ $name }},
                </td>
            </tr>    
            <tr>
                <td style="font-size:14px; padding:0 10px 10px 25px">
                    <p>Informamos que o pedido de n&uacute;mero <strong>{{ $order->id }}</strong> efetuado em {{ $order->created_at }} foi finalizado com sucesso.</p>

                    <h3><strong>DADOS DO PEDIDO</strong></h3>

                    <p>
                        N&ordm;. PEDIDO: <strong><font color="#FF0000">{{ $order->id }}</font></strong><br />
                        Data: <strong><font color="#FF0000">{{ $order->created_at }}</font></strong><br />
                        Forma de Pagamento: <strong><font color="#FF0000">Ainda n&atilde;o tem</font></strong><br />
                    </p>


                    <h3><strong>SEGURAN&Ccedil;A</strong></h3>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <h3><strong>PAGAMENTO</strong></h3>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>


                    <h3><strong>PRAZO DE ENTREGA</strong></h3>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>


                </td>      
            </tr>

            <tr>
                <td>
                    <table cellpadding="0" style="font-size:12px; font-weight:500;  padding:10px 0;" cellspacing="2" align="center" border="0" width="800">
                        <tr> 
                            <td width="50%" bgcolor="#CCCCCC" style="font-size:12px; color:#333; padding:10px 10px 10px 25px">
                                Loja 01 - Av. Isaac P&oacute;voas, 0000<br />
                                Bairro Goiabeiras - Cuiab&aacute; - MT<br />
                                Tel.  (65) 0000-0000
                            </td>
                            <td width="50%" bgcolor="#CCCCCC" style="font-size:12px; color:#333; padding:10px 10px 10px 25px">
                                Loja 02 - Av. Carmindo de Campos, 0000<br />
                                Jardim Petr&oacute;polis - Cuiab&aacute; - MT<br />
                                Tel.  (65) 0000-0000
                            </td>
                        </tr>
                    </table
                </td>
            </tr>    
        </table>
    </body>
</html>

</body>
</html>
