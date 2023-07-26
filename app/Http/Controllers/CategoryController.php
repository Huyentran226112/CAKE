<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $category->image = $path.$new_image;
            $data['product_image'] = $new_image;
        }
        $category->save();
        // alert()->success('Thêm', 'thành công');

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
            $path = 'public/assets/category/' . $category->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/assets/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $category->image = $new_image;
            // dd($product)
            $data['product_image'] = $new_image;
        }
        $category->save();
        // alert()->success('sửa', 'thành công');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Category = Category::find($id);
        $Category->delete();
        // alert()->success('Sản phẩm đã được đưa vào thùng rác!');
        return redirect()->route('categories.index');
    }
}
