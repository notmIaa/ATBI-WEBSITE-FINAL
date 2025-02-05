<?php

namespace App\Http\Controllers;

use App\Models\Incubatee;
use App\Models\IncubateeProduct;
use Illuminate\Http\Request;

class IncubateeProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incubateeProducts = IncubateeProduct::with('incubatee')->get();
        return view('admin.incubateeproduct', ['incubatee_products' => $incubateeProducts]);
    }
    public function create(Incubatee $incubatee)
    {
        return view('admin.incubatee_product_create', compact('incubatee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:incubatee_products,product_name',
            'incubatee_name' => 'required',
            'description' => 'required',
            'product_image' => 'nullable|image',
        ]);
    
        // Continue with storing the product after validation
        $incubateeProduct = new IncubateeProduct();
        $incubateeProduct->incubatee_id = $request->incubatee_id;
        $incubateeProduct->product_name = $request->product_name;
        $incubateeProduct->description = $request->description;
    
        // Handle the product image upload
        if ($request->hasFile('product_image')) {
            $path = $request->file('product_image')->store('product_images', 'public');
            $incubateeProduct->product_image = $path;
        }
    
        $incubateeProduct->save();
    
        return redirect()->route('incubateeproduct.index')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $incubateeProduct = IncubateeProduct::findOrFail($id);
        return view('admin.incubateeproduct_edit', compact('incubateeProduct'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'product_name' => 'required|string|max:255|unique:incubatee_products,product_name,' . $id,
        'description' => 'required|string|max:500',
        'product_image' => 'nullable|image|max:10240',
    ]);

        $incubateeProduct = IncubateeProduct::findOrFail($id);
        $incubateeProduct->product_name = $request->product_name;
        $incubateeProduct->description = $request->description;

        if ($request->hasFile('product_image')) {
        $path = $request->file('product_image')->store('public/products');
        $incubateeProduct->product_image = basename($path);
    }

        $incubateeProduct->save();

        return redirect()->route('incubateeproduct.index')->with('success', 'Product updated successfully!');
    }


    

    public function destroy(IncubateeProduct $incubateeProduct)
    {
        $incubateeProduct->delete();
        return redirect()->route('incubateeproduct.index')->with('success', 'Incubatee Product deleted successfully!');
    }

    public function show($id)
    {
        $incubateeproduct = IncubateeProduct::findOrFail($id);
        return view('admin.incubateeproduct_show', compact('incubateeproduct'));
    }

}
