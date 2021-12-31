<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $user = auth()->user();
        return view('category.index', ['category' => $category, 'user' => $user]);
    }

    public function show(Category $category)
    {
        $from = request('from', 0);
        $to = request('to', 0);
        $check = request('check', 0);
        $category->products = Products::where('quantity', '>', 0);
        $user = auth()->user();
        
        if($check)
        {
            $category->products->where('selected', '=', 1)->where('quantity', '>', 0);
        }
        if($from && $to)
        {
            $category->products->where('price', '>=', $from)->where('price', '<=', $to)->where('quantity', '>', 0);
        }
        return view('category.product', ['products' => $category->products->get(), 'user' => $user]);
    }

    public function addCategory(Request $req)
    {
        $category = new Category;
        $category->name=$req->name;
        $category->save();
        return redirect('/category');
    }
    
    public function showEdit($id)
    {
        $category = Category::find($id);
        return view('edit/category', ['editcategory'=>$category]);
    }

    public function uptodate(Request $req)
    {
        $category = Category::find($req->id);
        $category->name=$req->name;
        $category->save();
        return redirect('/category');
    }
    public function showDelete($id)
    {
        $category = Category::find($id);
        
        return view('category.delete', ['category' => $category]);
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete(); 
        return redirect('/category');
    }
}
