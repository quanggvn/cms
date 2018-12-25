<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use Cart;
class FrontendController extends Controller
{
    public function getHome(){
        $data['featured']  = Product::where('pro_featured', 1)->orderBy('pro_id', 'desc')->take(8)->get();
        $data['news']  = Product::orderBy('pro_id', 'desc')->take(8)->get();

        return view('frontend.home', $data);
    }
    Public function getDetail($id){
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('cmt_product', $id)->orderBy('cmt_id', 'desc')->get();
        return view('frontend.details', $data);
    }
    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('pro_cate', $id)->orderBy('pro_id', 'desc')
            ->paginate(8);
        return view('frontend.category', $data);
    }
    public function postComment(Request $request, $id){
        $comment = new Comment;
        $comment->cmt_name = $request->name;
        $comment->cmt_email = $request->email;
        $comment->cmt_content = $request->cmt_content;
        $comment->cmt_product = $id;
        $comment->save();
        return back();
    }
    public function getSearch(Request $request){
        $result = $request->result;
        $data['keyWord'] = $result;
        $result = str_replace('', '%', $result);
        $data['items'] = Product::where('pro_name', 'like', '%'.$result.'%')->paginate(8);
        return view('frontend.search', $data);
    }
//    public function getAddCart($id){
//       // dd($id);
//     /*   $product = Product::find($id);
//        Cart::add(['id' => $id, 'name' => $product->pro_name, 'qty' => 1,
//            'price' => $product->pro_price, 'options' => ['img' => $product->pro_img]]);
//        return back();*/
//        $data = Cart::content();
//     dd($data);
//    }
}
