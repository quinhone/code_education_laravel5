<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;

class CategoriesController extends Controller
{

    private $categoryModel;

    public function __construct(Category $categories)
    {
        $this->categoryModel = $categories;
    }

    public function index()
    {
        $categories = $this->categoryModel->orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index', compact('categories'));

    }

}