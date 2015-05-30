<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller {

    private $productModel;
    private $categoryModel;

    public function __construct(Product $products, Category $category)
    {
        $this->productModel = $products;
        $this->categoryModel = $category;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();

        $FProducts = $this->productModel->Featured()->get();
        $RProducts = $this->productModel->Recommend()->get();

        return view('store.index', compact('categories', 'FProducts', 'RProducts'));
    }

}
