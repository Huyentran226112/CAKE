@extends('admin.master')
@section('content')
<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong>Product create form</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-5">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control form-control-user" value="{{ old('name') }}"
                                name="name" placeholder="Tu tien">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col col-md-7">
                        <label class="form-label">Category</label>
                        <select class="form-control form-control-user" 
                            name="category_id">
                            <option>Select category...</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->id }} : {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control form-control-user" value="{{ old('quantity') }}"
                        name="quantity" placeholder="10">
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Discount</label>
                    <input type="text" class="form-control form-control-user" value="{{ old('discount') }}"
                        name="discount" placeholder="20%">
                    @error('discount')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control form-control-user" value="{{ old('price') }}" name="price"
                        placeholder="XXX.XXX VND">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Image</label>
                    <label for="file-upload" class="file-upload-label">
                        <input type="file" id="file-upload" value="{{ old('image') }}" name="image" accept="*"
                            title=" ">
                    </label>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('product.index') }}" class='btn btn-primary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection