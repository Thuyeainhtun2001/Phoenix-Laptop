<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //orderBtn data
    public function orderBtn(Request $request)
    {
        $subtotal=0;
        foreach($request->all() as $orderData){
           $data = OrderDetail::create([
                'user_id' => Auth::user()->id,
                'product_id' => $orderData['productId'],
                'order_number' => $orderData['orderNumber'],
                'qty' => $orderData['qty'],
                'total' => $orderData['total'],
            ]);
            $subtotal += $orderData['total'];
        }
        Order::create([
            'order_number' => $data->order_number,
            'user_id' => Auth::user()->id,
            'total_amount' => $subtotal+50,
            'order_delivered' => 0,
        ]);
        Cart::where('user_id', Auth::user()->id)->delete();
        return response(200);
    }
    // for orderList
    public function orderList(){
        $data = Order::select('orders.*','users.name as user_name')
                ->leftJoin('users','users.id','orders.user_id')
                ->paginate(6);
        return view('admin.orderList',compact('data'));
    }
    // for deliver
    public function deliver($orderNumber){
        Order::where('order_number',$orderNumber)->update(['order_delivered'=>1]);
        return back()->with(['success'=>'you can change order to deliver']);
    }
    // delete
    public function delete($orderNumber){
        Order::where('order_number',$orderNumber)->delete();
        OrderDetail::where('order_number',$orderNumber)->delete();
        return back()->with(['success'=>'delete order list is success...']);
    }
}
