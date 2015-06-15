<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;
    private $res;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->res = [];
    }

	public function index()
    {
        return view('store.cart');
    }

    public function getCesta()
    {
        $a = [];
        $cart = $this->getCart();

        if($cart->isNull())
        {
            $a = ['success' => 'false'];//Session::set('cart', $this->cart);
        }
    else
        {
            foreach($cart->all() as $k=>$item)
            {
                $a[] = $item;
            }
        }
        return json_encode($a);
    }

    public function  add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        $cart->add($id, $product->name, $product->price, $product->images->first()->id, $product->images->first()->extension);

        Session::set('cart', $cart);

        return redirect()->route('cart');

    }

    public function  updCesta($id, $qtd)
    {
        $cart = $this->getCart();

        $cart->update($id,  $qtd);

        Session::set('cart', $cart);

    }

    public function destroy($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return $this->res = ['success' => true];

    }

    public function getValorTotal()
    {
        $cart = $this->getCart();

       return  json_encode($cart->getTotal());
    }

    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

}
