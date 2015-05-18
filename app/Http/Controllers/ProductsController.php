<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Category;

class ProductsController extends Controller
{

	private $productModel;

	public function __construct(Product $products)
	{
		$this->productModel = $products;
	}	

	public function index()
	{
		$products = $this->productModel->orderBy('id', 'desc')->paginate(10);
		return view('products.index', compact('products'));
		
	}

	public function create(Category $category)
	{
		
		$categories = $category->lists('name', 'id');
		return view('products.create', compact('categories'));
	}

	public function store(Requests\ProductRequest $request)
	{

		$input = $request->all();
		
		$product = $this->productModel->fill($input);

		$product->save();

		return redirect()->route('products_index');
	}

	public function edit($id, Category $category)
	{
		$categories = $category->lists('name', 'id');
		$products = $this->productModel->find($id);

		return view('products.edit', compact('products', 'categories'));
	}

	public function update(Requests\ProductRequest $request, $id)
	{
		$this->productModel->find($id)->update($request->all());

		return redirect()->route('products_index');
	}


	public function destroy($id)
	{
		$this->productModel->find($id)->delete();

		return redirect()->route('products_index');
	}

}
