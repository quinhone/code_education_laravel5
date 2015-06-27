<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function place(Order $orderModel)
    {
        if (!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0)
        {
            $order = $orderModel->create(['user_id' => 1, 'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k => $item)
            {
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));
        } else
        {
            $cart = 'empty';
        }

        return view('store.checkout', compact('order', 'cart'));
    }

}
