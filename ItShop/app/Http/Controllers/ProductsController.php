<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $from = request('from', 0);
        $to = request('to', 0);
        $check = request('check', 0);
        $products = Products::where('quantity', '>', 0)->orderBy('id', 'DESC');

        if($check)
        {
            $products->where('selected', '=', 1)->where('quantity', '>', 0);
        }
        if($from && $to)
        {
            $products->where('price', '>=', $from)->where('price', '<=', $to)->where('quantity', '>', 0);
        }
        return view('welcome', ['products' => $products->get()]);
    }

    public function createRole(Request $request)
    {
        if($request->has('test')) {
        }
    }
}
