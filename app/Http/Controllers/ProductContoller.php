<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class ProductContoller extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $product = Product::with('category')->get();

        return view('products.index', compact('product'));
    }

    public function create()
    {
        $category = $this->categoryRepository->index();

        return view('products.create', compact('category'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $data['status'] = $request->has('status') ? true : false;

        if($request->hasFile('image'))
        {
            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('productImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        Product::create($data);

        return redirect()->route('products.index');
    }


    public function edit(string $id)
    {
        $product = Product::with('category')->where('id', $id)->first();

        return view('products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status  == 'on' ? 1 : 0,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete();

        return redirect()->route('products.index');
    }
}
