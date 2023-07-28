<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::with('category')->orderBy('id', 'DESC')->paginate(3);
        $param = [
            'items' => $items,
        ];
       return view('admin.products.index',$param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Category::get();
        $param = [
            'items' => $items,
        ];
        return view('admin.products.create',$param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->status;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $get_img = $request->file($fieldName);
            $path = 'storage/products/';
            $new_name_img = rand(1,100).$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $product->image = $path.$new_name_img;
        }
        $product->save();
        alert()->success('Thêm','Thành công');
        return redirect()->route('products.index');
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
        $categories = Category::get();
        $product = Product::with('category')->find($id);
        $param = [
            'categories' => $categories,
            'product' => $product,
        ];
        return view('admin.products.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->status;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $path = $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/products/';
            $get_img = $request->file($fieldName);
            $new_name_img = rand(1,100).$get_img->getClientOriginalName();
            $get_img->move($path,$new_name_img);
            $product->image = $path.$new_name_img;
        }
        $product->save();
        alert()->success('Cập nhập','Thành công');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Product::find($id);
        $item->delete();
        alert()->success('Sản phẩm đã được đưa vào thùng rác!');
        return back();
    }
    function trash(){
        $items = Product::with('category')->onlyTrashed()->orderBy('id', 'DESC')->paginate(5);
        return view('admin.products.trash',compact('items'));
    }
    function restore(String $id){
        try {
            $item = Product::withTrashed()->find($id);
            $item->restore();
            alert()->success('Restore product success');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            alert()->warning('Không thể khôi phục','Vui lòng thử lại sau');
            return back();
        }
    }
    function deleteforever(String $id){
        try {
            $item = Product::withTrashed()->find($id);
            $path = $item->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $item->forceDelete();
            alert()->success('Xóa thành công');
            return back();
        } catch (\Exception $e) {
            alert()->warning('Sản phẩm không thể xóa','Vui lòng kiểm tra hóa đơn');
            return back();
        }
    }
}
