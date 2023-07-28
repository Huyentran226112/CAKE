<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        try {
            //code...
            // $this->authorize('create',OrderDetail::class);
            $products = Product::get();
            $param = [
                'order_id' => $id,
                'products' => $products
            ];
            return view('admin.orderdetail.create',$param);
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detail = new OrderDetail();
        $detail->order_id = $request->order_id;
        $detail->product_id = $request->product_id;
        $detail->quantity = $request->quantity;
        $product = Product::find($detail->product_id);
        $price = $product->price;
        $discount = $product->discount;
        $total = ($price - (($price/100)*$discount))*$detail->quantity;
        $detail->total = $total;
        $detail->save();
        
        // update total.order, product.quantity, product.selled  
        $product->quantity -= $request->quantity;
        $product->selled += $request->quantity;
        $product->save();
        
        $total = 0;
        $order = Order::with('orderdetail')->find($detail->order_id);
        foreach ($order->orderdetail as $detail) {
            $total += $detail->total;
        }
        $order->total = $total;
        $order->save();
        // finish 
        alert()->success('Thêm chi tiết hóa đơn thành công');
        return redirect()->route('orders.show',$request->order_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            //code...
            // $this->authorize('create',OrderDetail::class);
            $products = Product::get();
            $detail = OrderDetail::find($id);
            $param = [
                'detail' => $detail,
                'products' => $products
            ];
            return view('admin.orderdetails.edit',$param);
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detail = OrderDetail::find($id);
        $detail->order_id = $request->order_id;
        $detail->product_id = $request->product_id;
        $detail->quantity = $request->quantity;
        $product = Product::find($detail->product_id);
        $price = $product->price;
        $discount = $product->discount;
        $total = ($price - (($price/100)*$discount))*$detail->quantity;
        $detail->total = $total;
        $detail->save();

        // update total.order, product.quantity, product.selled  
        $product->quantity -= $request->quantity;
        $product->selled += $request->quantity;
        $product->save();
        
        $total = 0;
        $order = Order::with('orderdetail')->find($detail->order_id);
        foreach ($order->orderdetail as $detail) {
            $total += $detail->total;
        }
        $order->total = $total;
        $order->save();
        // finish 

        alert()->success('Thêm đơn hàng thành công');
        return redirect()->route('orders.show',$request->order_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
