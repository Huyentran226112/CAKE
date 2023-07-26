@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="page-header">
    <h3 class="page-title">Danh sách sản phẩm</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{--  <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page"> Danh sách sản phẩm </li>
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
                            {{--  @if (Auth::user()->hasPermission('Product_create'))  --}}
                            <a href="{{ route('products.create') }}" class="btn btn-primary"> Thêm mới </a>
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
                            <a href="{{ route('products.index') }}" type="submit" class="btn btn-secondary">Đặt
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
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Thể loại</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img class='img-thumbnail' style="width:120px; height:100px"
                                        src="{{ asset($item->image) }}" alt=""></a></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price) .' VND'}}</td>

                                {{--  @if (Auth::user()->hasPermission('Product_update') || Auth::user()->hasPermission('Product_delete'))  --}}
                                <td>
                                    {{--  @if (Auth::user()->hasPermission('Product_update'))  --}}
                                    <a href="{{ route('products.restore',$item->id) }}" class="btn btn-info">Khôi phục</a>
                                    {{--  @endif  --}}

                                    {{--  @if (Auth::user()->hasPermission('Product_update'))  --}}
                                    <a href="{{ route('products.deleteforever',$item->id) }}" onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');"
                                        class="btn btn-danger">Hủy</a>
                                    {{--  @endif  --}}
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
</div>

@endsection