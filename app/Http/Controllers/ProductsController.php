<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;

class ProductsController extends Controller
{

	private $products;

	public function __construct(Product $products)
	{
		$this->products = $products;
	}	

	public function index()
	{
		$products = $this->products->all();
		return view('products.index', compact('products'));
		
	}

	public function create()
	{
		return view('products.create');
	}

}
