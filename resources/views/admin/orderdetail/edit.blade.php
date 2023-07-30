@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<script>
var products = @json($products -> keyBy('id') -> map(function($product) {
    return ['quantity' => $product -> quantity, 'max_quantity' => $product -> max_quantity];
}));
</script>
<div class="page-header">
    <h3 class="page-title">Thêm Mới</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Thêm Mới</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('orderdetail.update',$detail->id) }}" method='post'
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="order_id" value="{{ $detail->order_id }}">
                    <div class="form-group">
                        <label>Sản phẩm</label>
                        <select name='product_id' class="form-control" id="product-select">
                            <option value="{{$detail->product_id}}">{{$detail->product_id}} : {{$detail->product->name}}
                            </option>
                            @foreach($products as $product)
                            @if($product->quantity>0 && $product->status==1)
                            <option value="{{ $product->id }}">{{ $product->id }} : {{ $product->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('product_id')
                        <p class="text text-danger form-control">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Số lượng</label>
                        <input type="number" name="quantity" class="form-control quantity" min="1" max="" />
                        @error('quantity')
                        <p class="text text-danger form-control">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-info" type="submit">Thêm</button>
                        <a href="{{ route('orders.show',$detail->order_id) }}" class="btn btn-light">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
// Lắng nghe sự kiện khi select được thay đổi
// Lắng nghe sự kiện khi input quantity thay đổi
document.querySelector('.quantity').addEventListener('input', function() {
    var productName = document.getElementById('product-select').value;
    var product = products[productName];
    if (product) {
        var maxQuantity = parseInt(product.quantity);
        var quantity = parseInt(this.value);
        if (!isNaN(quantity) && quantity > maxQuantity) {
            this.value = maxQuantity;
        }
    }
});
</script>
@endsection