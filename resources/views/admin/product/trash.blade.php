@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Product Table </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <a href="{{ route('product.index') }}" class='badge btn-primary'>Back</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Avatar</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Price</th>
                                    <th>Selled</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="serial">{{ $product->id }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="{{ asset($product->image) }}"
                                                    alt=""></a>
                                        </div>
                                    </td>
                                    <td><span class="name">{{ $product->name }}</span> </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->discount.'%' }}</td>
                                    <td>{{ number_format($product->price) .' VND'}}</td>
                                    <td>{{ $product->selled }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('product.restore', $product->id) }}"
                                                onclick="return confirm('Do u want to restore record?');"
                                                class="badge btn-primary">Restore
                                            </a>
                                            <a href="{{ route('product.deleteforever', $product->id) }}"
                                                onclick="return confirm('Do u want to delete forever record?');"
                                                class="badge btn-danger">
                                                Detroy</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->
    </div>
</div>
@endsection