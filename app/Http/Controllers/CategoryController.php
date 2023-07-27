<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::orderBy('id', 'ASC')->paginate(5);
        $param = [
            'items' => $items,
        ];
       return view('admin.categories.index',$param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'storage/categories/';
            $new_image = rand(1,100).$get_image->getClientOriginalName();
            $get_image->move($path, $new_image);
            $category->image = $path.$new_image;

        }
        $category->save();
        alert()->success('Thêm', 'thành công');

        return redirect()->route('categories.index');
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
        $items = Category::find($id);
        $param = [
            'items' => $items,
        ];
        return view('admin.categories.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $get_image = $request->image;
        if ($get_image) {
            $path = $category->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'storage/categories/';
            $new_image = rand(1,100).$get_image->getClientOriginalName();
            $get_image->move($path, $new_image);
            $category->image =  $path.$new_image;
        }
        $category->save();
        alert()->success('sửa', 'thành công');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Category = Category::find($id);
        $Category->delete();
        alert()->success('Sản phẩm đã được đưa vào thùng rác!');
        return redirect()->route('categories.index');
    }
    public function trash()
    {
        $softs = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('softs'));
    }
    public function restore($id)
    {

        try {
            $softs = Category::onlyTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi phục sản phẩm thành công!');
            return redirect()->route('categories.trash');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('categories.trash');
      }
    }
    //xóa vĩnh viễn
    public function force_delete(string $id)
    {

        try {
            // Xoá vĩnh viễn category
            $category = Category::withTrashed()->find($id);
            $category->forceDelete();

            // Tìm tất cả các sản phẩm đã bị xóa mà có cate_id = $id
            $products = Product::onlyTrashed()->where('category_id', $id)->get();

            // Chuyển các sản phẩm đã tìm thấy về một cate_id khác
            foreach ($products as $product) {
                $product->category_id = 1; // Đặt category_id mới ở đây
                $product->save();
            }

            alert()->success('Xóa Vĩnh Viễn Thành Công!');
            return redirect()->route('categories.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('categories.trash');
        }
    }
}
