@extends('admin.master')
@section('content')
 @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Chỉnh Sửa Thể Loại</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Chỉnh Sửa Thể Loại </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form  action="{{route('categories.update',[$items->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Tên thể loại</label>
                            <input name="name" type="text" value='{{$items->name}}' class="form-control" >
                            @error('name')
                                <p class="text text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" value='{{$items->image}}'>
                            <img type="hidden" width="120px" height="120px" id="blah1"
                                                src=" {{asset( $items->image)}}" alt="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Cập nhật" >
                            <a href="{{route('categories.index')}}" class="btn btn-light">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
