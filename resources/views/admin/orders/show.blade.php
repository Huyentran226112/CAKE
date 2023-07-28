@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="page-header">
    <h3 class="page-title">Chi tiết hoá đơn</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{--  <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"> Chi tiết hoá đơn </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <form action="" method="get">
                    <div class="row mb-2">
                        <div class="col">
                            {{--  @if (Auth::user()->hasPermission('Orderdetail_create'))  --}}
                            <a href="{{ route('orderdetail.create',$order->id) }}" class="btn btn-primary"> Thêm mới
                            </a>
                            <a href="{{ route('orders.index') }}" class="btn btn-light"> Quay lại
                            </a>
                            {{--  @endif  --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="text" placeholder="Nhập ID" class="form-control" value="{{ request()->id }}"
                                name="id">
                        </div>
                        <div class="col">
                            <input type="text" placeholder="Nhập tên" class="form-control" value="{{ request()->name }}"
                                name="name">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-info"> Tìm </button>
                            <a href="{{ route('orders.show',$order->id) }}" type="submit" class="btn btn-secondary">Đặt
                                lại</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="6">Mã hóa đơn : {{$order->id}}</br>Ghi chú: {{$order->note}}</th>
                            </tr>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                                <th>Giảm giá</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->product->name}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>{{ number_format($detail->product->price) .' VND' }}</td>

                                <td>{{number_format($detail->total) .' %'}}</td>
                                <td>{{ number_format($detail->total) .' VND' }}</td>
                                <td>
                                    {{--  @if (Auth::user()->hasPermission('Orderdetail_update'))  --}}
                                    <form action="{{ route('orderdetail.destroy', $detail->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('orderdetail.edit', $detail->id) }}"
                                            class="btn btn-info">Sửa</a>
                                        {{--  @endif  --}}

                                        {{--  @if (Auth::user()->hasPermission('Orderdetail_update'))  --}}
                                        <button
                                            onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');"
                                            class="btn btn-danger">Xóa</button>
                                        {{--  @endif  --}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection