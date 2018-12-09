<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
class CartController extends Controller
{
    public function getAddCart($id){
        // dd($id);
           $product = Product::find($id);
           Cart::add(['id' => $id, 'name' => $product->pro_name, 'qty' => 1,
               'price' => $product->pro_price, 'options' => ['img' => $product->pro_img]]);
           return redirect('cart/show');

//        $data = Cart::content();
//        dd($data);
    }
    public function getShowCart(){
        $data['items'] = Cart::content();
        $data['total'] = Cart::total();
        return view('frontend.cart', $data);
    }
    public function getDeleteCart($id){
        if($id == 'all'){
            //dd('xoa het');
            Cart::destroy();
        }else{
           // dd('xoa 1');
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
    }
}
