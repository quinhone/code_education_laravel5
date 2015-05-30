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

class AdminProductsController extends Controller
{

    private $productModel;
    private $tagModel;

    public function __construct(Product $products, Tag $tag)
    {
        $this->productModel = $products;
        $this->tagModel = $tag;
    }

    public function index()
    {
        $products = $this->productModel->orderBy('id', 'asc')->paginate(10);
        return view('admin.products.index', compact('products'));

    }

    public function create(Category $category)
    {

        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request)
    {
        $tags = explode(',', $request->tag);

        foreach ($tags as $value)
        {
            $checkTag = $this->tagModel->where('name', '=', $value)->first();

            if(is_null($checkTag))
            {
                $tagId = $this->tagModel->create(['name' => $value]);
                $arrayId[] = $tagId->id;
            }
            else
            {
                $arrayId[] = $checkTag->id;
            }

        }

        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();

        $product->tags()->attach($arrayId);

        return redirect()->route('products_index');
    }

    public function edit($id, Category $category)
    {
        $list_tags='';
        $categories = $category->lists('name', 'id');
        $products = $this->productModel->find($id);
        $tags = $products->tags;

        foreach($tags as $tag)
        {
            $list_tags .= $tag->name.',';
        }

        return view('admin.products.edit', compact('products', 'categories'))->with('tags',  $list_tags);
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $tags = explode(',', $request->tag);

        foreach ($tags as $value)
        {
            $checkTag = $this->tagModel->where('name', '=', $value)->first();

            if(is_null($checkTag))
            {
                $tagId = $this->tagModel->create(['name' => $value]);
                $arrayId[] = $tagId->id;
            }
            else
            {
                $arrayId[] = $checkTag->id;
            }

        }

        $product = $this->productModel->find($id)->update($request->all());

        $product = $this->productModel->find($id);

        $product->tags()->sync($arrayId);

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

        return view('admin.products.images', compact('product') );
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('admin.products.create_image', compact('product') );
    }

    public function  storeImage(Requests\ProductImageRequest $request, $id, ProductImages $productImages)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image =  $productImages::create(['product_id' => $id, 'extension' => $extension ]);

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
