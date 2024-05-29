<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $products = Product::query()->orderBy('created_at','desc')->get();
        return view('store.index',compact('products'));
    }
}
