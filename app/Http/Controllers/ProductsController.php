<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\ProductImages;
use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    /**
     * TRABALHANDO COM UPLOAD DE IMAGES
     */

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product') );
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product') );
    }

    public function  storeImage(Requests\ProductImageRequest $request, $id, ProductImages $productImages)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

       $image =  $productImages::create(['product_id' => $id, 'extension' => $extension, 'local' => $request['server'] ]);

        Storage::disk('local_public')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products_images', ['id' => $id]);
    }

    public function destroyImage(ProductImages $productImages, $id)
    {
        $image = $productImages->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
        {
            Storage::disk('local_public')->delete($image->id.'.'.$image->extension);
         }

        $product = $image->product;

        $image->delete();

        return redirect()->route('products_images', ['id' => $product->id]);

    }
}
