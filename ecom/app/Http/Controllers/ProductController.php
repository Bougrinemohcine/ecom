<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(5);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = new Product;
        $isUpdate = false;
        return view('product.create',compact('products','isUpdate'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product'), $imageName);
            $formFields['image'] = 'product/' . $imageName;
        }

        Product::create($formFields);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $products = new Product;
        $isUpdate = true;
        return view('product.create',compact('products','isUpdate','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
{
    $formFields = $request->validated();

    // Handling image update
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if (file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('product'), $imageName);
        $formFields['image'] = 'product/' . $imageName;
    }

    $product->fill($formFields)->save();
    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //


        // Delete the product record from the database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');    }
}
