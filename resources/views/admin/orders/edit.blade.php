@extends('admin.master')
@section('content')
 {{--  @include('sweetalert::alert')  --}}
    <div class="page-header">
        <h3 class="page-title">Chỉnh Sửa Hóa Đơn</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Chỉnh Sửa Hóa Đơn </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form  action="{{route('orders.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Tên khách hàng</label>
                            <input type="hidden" name="customer_id" value='{{$item->customer_id}}'>
                            <input type="text" value='{{$item->customer->name}}' class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Ngày giao hàng</label>
                            <input type="date" value='{{$item->date_ship}}' name="date_ship" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Ghi chú</label>
                            <textarea name="note" id="description">{{ old('note') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Cập nhật" >
                            <a href="{{route('orders.index')}}" class="btn btn-light">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
