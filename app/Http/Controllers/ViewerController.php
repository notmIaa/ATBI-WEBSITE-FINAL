<?php

namespace App\Http\Controllers;
use App\Models\IncubateeProduct;
use App\Models\Incubatee;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    public function dashboard()
    {
        $incubatees = Incubatee::all();
        return view('viewer.home', compact('incubatees'));
    }

    public function incubateeList()
    {
        $incubatees = Incubatee::all();
        return view('viewer.incubatee_list', compact('incubatees'));
    }

    public function productList()
    {
        $incubateeproducts = IncubateeProduct::all();
        return view('viewer.product_list', compact('incubateeproducts'));
    }

    public function show($id)
    {
        $incubatee = Incubatee::with('products')->findOrFail($id);
        return view('viewer.incubatee_show', compact('incubatee'));
    }

    public function showproduct($id)
    {
        $incubateeproduct = IncubateeProduct::findOrFail($id);
        return view('admin.incubateeproduct_show', compact('incubateeproduct'));
    }

    
}
