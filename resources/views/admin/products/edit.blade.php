@extends('admin.master')
@section('content')
{{--  @include('sweetalert::alert')  --}}
<div class="page-header">
    <h3 class="page-title">Chỉnh sửa Thể Loại</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Chỉnh sửa Sản Phẩm </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.update',$product->id) }}" method='post' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên "
                            value="{{ $product->name }}">
                        @error('name')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <select name="category_id" class="form-control" id="">
                            <option value="{{$product->id}}">{{$product->category->id}} : {{$product->category->name}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->id}} : {{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Số lượng</label>
                        <input name="quantity" type="number" class="form-control" placeholder="Nhập số lượng "
                            value="{{ $product->quantity }}">
                        @error('quantity')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Giá tiền</label>
                        <input name="price" type="number" class="form-control" placeholder="Nhập giá tiền "
                            value="{{ $product->price }}">
                        @error('price')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Description</label>
                        <textarea type="text" class="is-invalid form-control" name="description"
                            id="description">{{ $product->description }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="image" class="control"></br>
                        @error('image')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                        <img class='img-thumbnail w-25' src="{{ asset($product->image) }}" alt="">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-info" type="submit">Thêm</button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection