<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //for order detail
    public function detail($orderNumber)
    {
       $data1 =  OrderDetail::where('order_details.order_number', $orderNumber)
            ->select(
                'order_details.*',
                'products.name as product_name',
                'products.description as product_des',
                'products.price as product_price',
                'products.image as product_image'
            )
            ->leftJoin('products', 'products.id', 'order_details.product_id')
            ->get();
         // for detail user name
         $data2 = Order::select('orders.*','users.name as user_name')
                        ->leftJoin('users','users.id','orders.user_id')
                        ->first();
        return view('admin.orderListDetail',compact('data1','data2'));
    }
}
