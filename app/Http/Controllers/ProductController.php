<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero_bg = asset("images/bg1.png");
        $col_bg_1 = asset("images/Frame 5.png");
        $col_bg_2 = asset("images/cat2.jpg");

        return view("home.index", compact('hero_bg', 'col_bg_1', 'col_bg_2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("product.create");
    }

    public function store(SaveProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile("image")) {
            $validated['image'] = $this->file_handler($request, 'image', 'product_images');
        }
        Product::create($validated);
        session([
            'status' => 'success',
            "message"=>"product creation was successful"
        ]);
        return redirect()->route('dashboard.index');
    }

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }
    public function update(SaveProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        if($request->hasFile('image')){
            if($product->image){
                Storage::disk('public')->delete($product->image);
            }

            $validated['image'] = $this->file_handler($request, 'image', 'product_images');
        }

        $product->update($validated);
        session([
            'status' => 'success',
            "message"=>"Product has been successfully updated"
        ]);
        return redirect()->route('dashboard.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session([
            'status' => 'success',
            "message"=>"Product has been successfully removed"
        ]);
        return redirect()->back();
    }
}
