<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;

class AdminCategoriesController extends Controller
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

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();

        $categories = $this->categoryModel->fill($input);

        $categories->save();

        return redirect()->route('category_index');
    }

    public function edit($id)
    {
        $categories = $this->categoryModel->find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->categoryModel->find($id)->update($request->all());

        return redirect()->route('category_index');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect()->route('category_index');
    }

}
