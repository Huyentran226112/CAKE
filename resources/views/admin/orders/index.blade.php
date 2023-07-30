@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="page-header">
    <h3 class="page-title">Danh sách hoá đơn</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{--  <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"> Danh sách hoá đơn </li>
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
                            {{--  @if (Auth::user()->hasPermission('Order_create'))  --}}
                            <a href="{{ route('orders.create') }}" class="btn btn-primary"> Thêm mới </a>
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
                            <a href="{{ route('orders.index') }}" type="submit" class="btn btn-secondary">Đặt
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
                                <th>Mã hoá đơn</th>
                                <th>Ảnh</th>
                                <th>Khách hàng</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img class='img-thumbnail' style="width:120px; height:100px" src="{{ asset($item->customer->image) }}" alt=""></td>
                                <td>
                                    <div onclick="window.location.href='{{ route('customers.show',$item->customer_id) }}';">
                                        {{ $item->customer->name }}
                                    </div>
                                </td>
                                <td>
                                    @if($item->status == 0)
                                    <span class="btn btn-light">Chưa hoàn thành</span>
                                    @elseif($item->status == 1) 
                                    <span class="btn btn-success">Hoàn thành</span>
                                    @endif
                                </td>
                                <td>{{ number_format($item->total) .' VND' }}</td>
                                {{--  @if (Auth::user()->hasPermission('Order_update') || Auth::user()->hasPermission('Order_delete'))  --}}
                                <td>
                                    {{--  @if (Auth::user()->hasPermission('Order_update'))  --}}
                                    <form action="{{ route('orders.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        @if ( $item->status == 0)
                                        <a href="{{ route('orders.edit', $item->id) }}" class="btn btn-info">Sửa</a>
                                        @endif
                                        {{--  @endif  --}}

                                        {{--  @if (Auth::user()->hasPermission('Order_delete'))  --}}
                                        @if ( $item->status == 0)
                                        <button
                                            onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');"
                                            class="btn btn-danger">Xóa</button>
                                        @endif
                                        {{--  @endif  --}}
                                        <a href="{{ route('orders.show', $item->id) }}" class="btn btn-info">Chi tiết</a>
                                    </form>
                                </td>
                                {{--  @endif  --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination">
                {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection