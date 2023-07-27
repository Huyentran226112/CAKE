@extends('admin.master')
@section('content')
{{--  @include('sweetalert::alert')  --}}
<div class="page-header">
    <h3 class="page-title">Thêm Mới Sản Phẩm</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Thêm Mới Sản Phẩm </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.store') }}" method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên sản phẩm</label>
                        <input name="name" type="text" class="form-control" placeholder="Nhập tên "
                            value="{{ old('name') }}">
                        @error('name')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên thể loại</label>
                        <select name="category_id" class="form-control" id="">
                            <option>Chọn thể loại..</option>
                            @foreach($items as $item)
                            <option value="{{$item->id}}">{{$item->id}} : {{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Số lượng</label>
                        <input name="quantity" type="number" class="form-control" placeholder="Nhập số lượng "
                            value="{{ old('quantity') }}">
                        @error('quantity')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Giá tiền</label>
                        <input name="price" type="number" class="form-control" placeholder="Nhập giá tiền "
                            value="{{ old('price') }}">
                        @error('price')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Mô tả</label>
                        <textarea type="text" class="is-invalid form-control" name="description"
                            id="description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mb-3 ">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="image" class="control" value="{{ old('image') }}">
                        @error('image')
                        <p class="text text-danger ">{{ $message }}</p>
                        @enderror
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