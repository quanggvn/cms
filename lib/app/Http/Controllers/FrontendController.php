<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class FrontendController extends Controller
{
    public function getHome(){
        $data['featured']  = Product::where('pro_featured', 1)->orderBy('pro_id', 'desc')->take(8)->get();
        $data['news']  = Product::orderBy('pro_id', 'desc')->take(8)->get();

        return view('frontend.home', $data);
    }
    Public function getDetail($id){
        $data['item'] = Product::find($id);
        return view('frontend.details', $data);
    }
    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('pro_cate', $id)->orderBy('pro_id', 'desc')
            ->paginate(4);
        return view('frontend.category', $data);
    }
}
