<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller {

    private $productModel;
    private $categoryModel;
    private $tagModel;

    public function __construct(Product $products, Category $category, Tag $tag)
    {
        $this->productModel = $products;
        $this->categoryModel = $category;
        $this->tagModel = $tag;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();
        $pFeatured = $this->productModel->Featured()->get();
        $pRecommend = $this->productModel->Recommend()->get();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public  function category($id)
    {
        $categories = $this->categoryModel->all();
        $category = $this->categoryModel->find($id);
        $products =  $this->productModel->ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($id)
    {
        $categories = $this->categoryModel->all();
        $product =  $this->productModel->find($id);

        return view('store.product', compact('categories', 'product'));
    }

    public function  productsByTag($tag)
    {
        $categories = $this->categoryModel->all();
       // $tagname =  $this->tagModel->find(48);
        $tagname =  $this->tagModel->where('name', '=', $tag)->first();
        $products =  $this->productModel->ofTag($tagname->id)->get();

        return view('store.tag', compact('categories', 'products', 'tagname'));
    }

}
