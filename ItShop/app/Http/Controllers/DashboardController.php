<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $from = request('from', 0);
        $to = request('to', 0);
        $check = request('check', 0);
        $products = Products::where('quantity', '>', 0)->orderBy('id', 'DESC');
        $user = auth()->user();

        if($check)
        {
            $products->where('selected', '=', 1)->where('quantity', '>', 0);
        }
        if($from && $to)
        {
            $products->where('price', '>=', $from)->where('price', '<=', $to)->where('quantity', '>', 0);
        }
        return view('dashboard', ['products' => $products->get(), 'user' => $user]);
    }
    public function replenish()
    {
        $user = auth()->user();

        return view('replenish.index', ['user' => $user]);
    }

    public function endreplenish(Request $req)
    {
        $user = User::find($req->id);
        $user->balance = $user->balance + $req->balance;
        $user->save();
        return redirect('/dashboard');

    }

    public function showEdit($id)
    {
        $products = Products::find($id);
        return view('edit/product', ['edit'=>$products]);
    }

    public function uptodate(Request $req)
    {
        $products = Products::find($req->id);
        $products->name=$req->name;
        $products->company=$req->company;
        $products->price=$req->price;
        $products->quantity=$req->quantity;
        $products->selected=$req->selected;
        $products->category_id=$req->category_id;
        $products->save();
        return redirect('/dashboard');
    }
    
    

    public function addProduct(Request $req)
    {
        $products = new Products;
        $products->name=$req->name;
        $products->company=$req->company;
        $products->price=$req->price;
        $products->quantity=$req->quantity;
        $products->selected=$req->selected;
        $products->category_id=$req->category_id;
        $products->save();
        
        return redirect('/dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showProduct($id)
    {
        $products = Products::find($id);
        $user = auth()->user();

        return view('product', ['product'=>$products, 'user' => $user]);
    }

    public function deleteProduct(Request $req)
    {
        if (!auth()->user()) {
            return redirect('/login');
        }
        $products = Products::find($req->id);
        $users = auth()->user();
        $users->balance = $users->balance - $products->price;

        if ($users->balance < 0) 
        {
            return redirect('/login');
        }
        
        $products->quantity = $products->quantity - 1;
        $users->save();
        $products->save();

        return redirect('/login');
    }

    public function deleteAdminProduct(Request $req)
    {
        $products = Products::find($req->id);
        
        $products->quantity = $products->quantity - $products->quantity;
        $products->save();

        return redirect('/login');
    }
}