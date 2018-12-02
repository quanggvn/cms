<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function getProduct(){
        return view('backend.product');
    }
    public function getAddProduct(){
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }
    public function postAddProduct(AddProductRequest $request){
        $fileName = $request->img->getClientOriginalName();
        $product = new Product;
        $product->pro_name = $request->name;
        $product->pro_slug = str_slug($request->name);
        $product->pro_img = $fileName;
        $product->pro_accessories = $request->accessories;
        $product->pro_price = $request->price;
        $product->pro_warranty = $request->warranty;
        $product->pro_promotion = $request->promotion;
        $product->pro_condition = $request->condition;
        $product->pro_status = $request->status;
        $product->pro_description = $request->description;
        $product->pro_featured = $request->featured;
        $product->pro_cate = $request->cate;
        $product->save();
        $request->img->storeAs('avata', $fileName);
        return back();
    }
    public function getEditProduct(){
        return view('backend.editproduct');
    }
    public function postEditProduct(){

    }
    public function getDeleteProduct(){

    }
}
