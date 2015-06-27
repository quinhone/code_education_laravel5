<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Auth;
use CodeCommerce\Order;
use CodeCommerce\Commerce;

class AdminAccountController extends Controller {

    public function index()
    {
        
    }
    
    public function orders(Order $order, Commerce $commerce)
    {
        //$userID = Auth::user()->id;
        $orders = $order->orderBy('id','DESC')->get();
        //dd($orders);
        
        $comm = $commerce;
        
        //$orders = Auth::user()->orders;
        
        return view('admin.orders', compact('orders', 'comm'));
    }
    
    public function atualizaStatus($status, $id)
    {

        $orderModel = Order::find($id);
        $orderModel->status = $status;
        
        if($orderModel->save())
        {
            $res = ['success' => true];
        }
        else
        {
            $res = ['success' => false];
        }
        
        return $res;
    }

}
