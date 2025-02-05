<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Incubatee;
use App\Models\IncubateeProduct;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
         $incubateeProduct = IncubateeProduct::with('incubatee')->get();
         if (auth()->user() && auth()->user()->role === 'admin') {
             return view('admin.dashboard', ['incubatee_products' => $incubateeProduct]);
         } else {
             return view('viewer.home', ['incubatee_products' => $incubateeProduct]);
         }
    }
}
