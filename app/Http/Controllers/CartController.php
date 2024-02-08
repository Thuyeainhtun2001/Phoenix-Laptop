<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //for add to cart
    public function cartAdd(Request $request){
        Cart::create([
            'user_id'=>$request->userId,
            'product_id'=>$request->productId,
            'qty'=>$request->qty,
        ]);
        return response(200);
    }
    // for cart badge and list
    public function cartList(){
        $data = Cart::where('carts.user_id',Auth::user()->id)
            ->select('carts.*','products.image as product_image',
            'products.name as product_name','products.price as product_price')
            ->leftJoin('products','products.id','carts.product_id')
            ->get();
        $subtotal = 0;
        foreach($data as $cartData){
            $subtotal += $cartData->qty * $cartData->product_price;
        }
        return view('cart',compact('data','subtotal'));
    }
    // for delete cart
    public function deleteCart(Request $request){
        Cart::where('id',$request->cartId)
            ->where('user_id',Auth::user()->id)
            ->delete();
    }
    // for cancel
    public function cancel(){
        Cart::where('user_id',Auth::user()->id)->delete();
        return redirect()->route('phoenix.home');
    }
}
