<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\ProductImages;
use CodeCommerce\Tag;
use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

	private $productModel;
    private $tagModel;

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
