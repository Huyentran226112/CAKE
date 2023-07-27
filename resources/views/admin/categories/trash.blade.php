@extends('admin.master')
@section('content')
    @include('sweetalert::alert')
    <div class="page-header">
        <h3 class="page-title">Thùng rác</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Thùng rác thể loại </li>
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
                                <a href="{{ route('categories.index') }}" class="btn btn-primary"> Quay lại </a>
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
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($softs as $key => $soft)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $soft->name }}</td>
                                        {{--  @if (Auth::user()->hasPermission('Category_restore') || Auth::user()->hasPermission('Category_forceDelete'))  --}}
                                            <td>
                                                {{--  @if (Auth::user()->hasPermission('Category_restore'))  --}}

                                                            {{--  <form action="{{ route('categories.destroy', [$soft->id]) }}" method='post'>
                                                                <a href="{{ route('cate.restore', [$soft->id]) }}" class="btn btn-info">Khôi phục</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="{{ route('categories.force-delete', [$soft->id]) }}"</a>
                                                                     <button onclick="return confirm('Bạn có muốn Xóa vĩnh viễn không?');"
                                                        class="btn btn-danger">Xóa vĩnh viễn</button>  --}}

                                                        <form action="{{ route('categories.destroy', [$soft->id]) }}" method='post'>
                                                            <a href="{{ route('cate.restore', [$soft->id]) }}" class="btn btn-warning">Khôi phục</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('categories.force-delete', [$soft->id]) }}"
                                                                onclick="return confirm('Bạn có chắc chắn xóa vĩnh viễn không?');"
                                                                class="btn btn-secondary">Xóa vĩnh
                                                                viễn</a>

                                                        </form>


                                                {{--  @endif  --}}
                                            </td>
                                          {{--  @endif  --}}
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
