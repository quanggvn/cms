<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function getProduct(){
        $data['productList'] = DB::table('vp_products')->join('vp_categories',
            'vp_products.pro_cate', '=', 'vp_categories.cate_id')
            ->orderBy('pro_id', 'desc')->get();
        return view('backend.product', $data);

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
        $request->img->storeAs('avatar', $fileName);
        return back();
    }
    public function getEditProduct($id){
        $data['product'] = Product::find($id);
        $data['listCate'] = Category::all();
        return view('backend.editproduct', $data);
    }
    public function postEditProduct(Request $request,$id){
        $product = new Product;
        $arr['pro_name'] = $request->name;
        $arr['pro_slug'] = str_slug($request->name);
        $arr['pro_accessories'] = $request->accessories;
        $arr['pro_price'] = $request->price;
        $arr['pro_warranty'] = $request->warranty;
        $arr['pro_promotion'] = $request->promotion;
        $arr['pro_condition'] = $request->condition;
        $arr['pro_status'] = $request->status;
        $arr['pro_description'] = $request->description;
        $arr['pro_featured'] = $request->featured;
        $arr['pro_cate'] = $request->cate;
        if ($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['pro_img'] = $img;
            $request->img->storeAs('avatar'.$img);
        }
        $product::where('pro_id', $id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct(){

    }
}
