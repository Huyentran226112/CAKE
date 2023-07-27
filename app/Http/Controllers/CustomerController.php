<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Customer::orderby('id', 'DESC')->paginate(4);
        $param = [
            'items' => $items,
        ];
        return view('admin.customers.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $Customer = new customer();
        $Customer->name = $request->name;
        $Customer->address = $request->address;
        $Customer->email = $request->email;
        $Customer->phone = $request->phone;
        $Customer->day_of_birth = $request->day_of_birth;
        $Customer->password = $request->password;

        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'storage/customers/';
            $new_image = rand(1, 100) . $get_image->getClientOriginalName();
            $get_image->move($path, $new_image);
            $Customer->image = $path . $new_image;
        }
        $Customer->save();
        alert()->success('Thêm', 'thành công');

        return redirect()->route('Customers.index');
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
        $item = Customer::find($id);
        $param = [
            'items' => $item,
        ];
        return view('admin.customers.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Customer = Customer::find($id);
        $Customer->name = $request->name;
        $Customer->address = $request->address;
        $Customer->email = $request->email;
        $Customer->phone = $request->phone;
        $Customer->day_of_birth = $request->day_of_birth;
        // $Customer->password = $request->password;
        $get_image = $request->image;
        if ($get_image) {
            $path = $Customer->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/customers/';
            $new_image = rand(1,100).$get_image->getClientOriginalName();
            $get_image->move($path, $new_image);
            $Customer->image =  $path.$new_image;
        }
        $Customer->save();
        alert()->success('sửa', 'thành công');
        return redirect()->route('Customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Customer = Customer::find($id);
        $Customer->delete();
        alert()->success(' đã xóa thành công!');
        return redirect()->route('Customers.index');
    }

}
