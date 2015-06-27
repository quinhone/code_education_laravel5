<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Auth;
use CodeCommerce\Order;
use CodeCommerce\Commerce;

class AccountController extends Controller
{

    public function index()
    {
        
    }
    
    public function orders(Order $order, Commerce $commerce)
    {
        $userID = Auth::user()->id;
        $orders = $order->where('user_id', '=', $userID)->orderBy('id','DESC')->get();
        
        $comm = $commerce;
        
        //$orders = Auth::user()->orders;
        
        return view('store.orders', compact('orders', 'comm'));
    }

}
