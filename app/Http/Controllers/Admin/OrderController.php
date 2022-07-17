<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Bill;
use App\Models\BillDetail;

class OrderController extends Controller
{
    //
    public function __construct(Bill $order, BillDetail $order_detail) {
   
        $this->order = $order;
        $this->order_detail = $order_detail;
    }
    public function index() {
        $bill = $this->order->paginate(5);
        return view('admin.order.index', compact('bill'));
    }
    public function edit($id) {

        $bill = Bill::find($id);

        $orderDetail = new BillDetail();
        $orderDetailList = $orderDetail::join('products', 'products.id', 'order_detail.product_id')
                        ->select('order_detail.*', 'products.name')
                        ->where('cart_id', '=', $id)
                        ->get();

        return view('admin.order.edit', compact('bill', 'orderDetailList'));
    }
}
