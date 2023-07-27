@extends('admin.master')
@section('content')
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
                            <a href="{{ route('orderdetail.create') }}" class="btn btn-primary"> Thêm mới </a>
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
                            <a href="{{ route('orderdetail.index') }}" type="submit" class="btn btn-secondary">Đặt
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
                                <th>{{$items->id}} : {{$items->customer->name}}</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach ($items->orderdetail as $key => $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->discount}}</td>
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