
@extends('admin.master')
@section('content')
        {{--  @include('sweetalert::alert')  --}}
        <div class="page-header">
            <h3 class="page-title">Danh sách thể loại</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{--  <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>  --}}
                    <li class="breadcrumb-item active" aria-current="page"> Danh sách thể loại </li>
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
                                    {{--  @if (Auth::user()->hasPermission('Category_create'))  --}}
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary"> Thêm mới </a>
                                    {{--  @endif  --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input type="text" placeholder="Nhập ID" class="form-control"
                                        value="{{ request()->id }}" name="id">
                                </div>
                                <div class="col">
                                    <input type="text" placeholder="Nhập tên" class="form-control"
                                        value="{{ request()->name }}" name="name">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-info"> Tìm </button>
                                    <a href="{{ route('categories.index') }}" type="submit" class="btn btn-secondary">Đặt
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
                                        <th>Tên Thể loại</th>
                                        <th>Ảnh</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img
                                                style="width:120px; height:100px" src="{{ $item->image }}"
                                                alt=""></a></td>
                                            {{--  @if (Auth::user()->hasPermission('Category_update') || Auth::user()->hasPermission('Category_delete'))  --}}
                                                <td>
                                                    {{--  @if (Auth::user()->hasPermission('Category_update'))  --}}
                                                        <form action="{{ route('categories.destroy', [$item->id]) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="{{ route('categories.edit', $item['id']) }}"
                                                                class="btn btn-info">Sửa</a>
                                                    {{--  @endif  --}}

                                                    {{--  @if (Auth::user()->hasPermission('Category_update'))  --}}
                                                        <button
                                                            onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');"
                                                            class="btn btn-danger">Xóa</button>
                                                    {{--  @endif  --}}
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
        </div>

    @endsection
