<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;

class CategoriesController extends Controller
{

	private $categories;

	public function __construct(Category $categories)
	{
		$this->categories = $categories;
	}	

	public function index()
	{
		$categories = $this->categories->all();
		return view('categories.index', compact('categories'));
		
	}

	public function create()
	{
		return view('categories.create');
	}

}
