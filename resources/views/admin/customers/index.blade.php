@extends('admin.master')
@section('content')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Danh sách khách hàng</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {{--  <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>  --}}
                <li class="breadcrumb-item active" aria-current="page">Danh sách khách hàng</li>
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
                                <a href="{{ route('customers.create') }}" class="btn btn-primary"> Thêm mới </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="Nhập ID" class="form-control" value="{{ request()->id }}"
                                    name="id">
                            </div>
                            <div class="col">
                                <input type="text" placeholder="Nhập tên" class="form-control"
                                    value="{{ request()->name }}" name="name">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-info"> Tìm </button>
                                <a href="{{ route('customers.index') }}" type="submit" class="btn btn-secondary">Đặt
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
                                    <th>Tên khách hàng </th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address}}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
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
