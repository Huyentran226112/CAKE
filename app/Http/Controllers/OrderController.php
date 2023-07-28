<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...
            // $this->authorize('viewAny',Order::class);
            $items = Order::with('customer','orderdetail')->orderBy('id', 'DESC')->paginate(3);
            return view('admin.orders.index',compact(['items']));
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            //code...
            // $this->authorize('create',Order::class);
            $customers = Customer::get();
            $products = Product::get();
            $param =[
                'customers' => $customers,
                'products' => $products
            ];
            return view('admin.orders.create',$param); 
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->date_ship = Carbon::now()->addDays(5);
        $order->note = $request->note;
        $order->total = 0;
        $order->save();
        $detail = new OrderDetail();
        $detail->order_id = $order->id;
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
        foreach ($order->orderdetail as $detail) {
            $total += $detail->total;
        }
        $order->total = $total;
        $order->save();
        // finish
        alert()->success('Thêm hóa đơn','Thành công');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        try {
            //code...
            $order = Order::with('orderdetail','customer')->orderBy('id', 'DESC')->findOrFail($id);
            // $this->authorize('view', $order);
            $details = OrderDetail::with('product')->where('order_id',$id)->get();
            $param = [
                'order' => $order,
                'details' => $details,
            ];
            return view('admin.orders.show',$param);
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        try {
            //code...
            $item = Order::with('customer')->find($id);
            // $this->authorize('update',$order);
            return view('admin.orders.edit',compact(['item']));
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, String $id)
    {
        $order = Order::with('orderdetail')->find($id);
        $order->customer_id = $request->customer_id;
        $order->date_ship = $request->date_ship;
        $order->note = $request->note;
        $total = 0;
        foreach ($order->orderdetail as $detail) {
            $total += $detail->total;
        }
        $order->total = $total;
        $order->updated_at = Carbon::now();
        $order->save();
        alert()->success('Cập nhập hóa đơn','Thành công');
        return redirect()->route('orders.index');
    }
    
    public function destroy(String $id)
    {
        try {
            //code...
            $order = Order::find($id);
            // $this->authorize('delete',$order);
            $order->delete();
            alert()->success('Xóa đơn hàng thành công');
            return back();
        } catch (\Exception $e) {
            alert()->warning('Bạn không có quyền truy cập');
            return back();
        } 
    }
}