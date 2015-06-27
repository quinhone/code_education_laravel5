<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Controllers\Controller;


use CodeCommerce\Product;
use CodeCommerce\Category;

class ProductsController extends Controller
{

	private $productModel;
        private $categoryModel;

	public function __construct(Product $products, Category $category)
	{
        $this->productModel = $products;
        $this->categoryModel = $category;
	}	

	public function index($id)
	{
        $categories = $this->categoryModel->all();

		$products = $this->productModel->where('category_id', '=',  $id)->get();
		return view('products.index', compact('products', 'categories'));
	}


}
