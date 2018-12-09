<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
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
    public function postComplete(Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
      //  dd($data);
        Mail::send('frontend.email', $data, function ($message) use ($email){
            $message->from('giapvanngocquang@gmail.com', 'Ngoc Quang');
            $message->to($email, $email);
            $message->cc('ngocquang97bg@gmail.com', 'Ngoc Quang');
            $message->subject('Xác nhận mua hàng CMS Shop!');
        });
        Cart::destroy();
        return redirect('complete');
    }
    public function getComplete(){
        return view('frontend.complete');
    }
}
