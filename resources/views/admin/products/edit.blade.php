@extends('layouts.admin')

@section('content')

<div class="bg bg-dark">
    <h3 class="bg bg-white">Add Product</h3>
</div>
<form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row ">
        <div class="col-md-12 mb-3">
            <select class="form-select">
                <option value="">{{ $products->category->name }}</option>
            </select>
        </div>
        <div class="col-md-6 mb-3 ">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $products->name }}">
        </div>
        <div class="col-md-6 mb-3 ">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $products->slug }}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Small Description</label>
            <textarea rows="3" class="form-control" name="small_description">{{ $products->small_description }}</textarea>
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Description</label>
            <textarea rows="3" class="form-control" name="description">{{ $products->description }}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Original Price</label>
            <input type="number" class="form-control" name="original_price" value="{{ $products->original_price }}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Selling Price</label>
            <input type="number" class="form-control" name="selling_price" value="{{ $products->selling_price }}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Tax</label>
            <input type="number" class="form-control" name="tax" value="{{ $products->tax }}" >
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Quantity</label>
            <input type="number" class="form-control" name="qty" value="{{ $products->qty }}">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input type="checkbox" name="status" {{ $products->status == "1" ? 'checked' : '' }}>
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Trending</label>
            <input type="checkbox" name="trending" {{ $products->trending == "1" ? 'checked' : '' }}>
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta_title</label>
            <input type="text" class="form-control" name="meta_title" value="{{ $products->meta_title }}">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta_description</label>
            <textarea rows="3" class="form-control" name="meta_description">{{ $products->meta_description }}</textarea>
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta_keywords</label>
            <textarea rows="3" class="form-control" name="meta_keywords">{{ $products->meta_keywords }}</textarea>
        </div>
        @if ($products->image)
            <img src="{{ asset('assets/uploads/products/'.$products->image) }}">
        @endif

        <div class="col-md-12 mb-3">
            <label for="">Images</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </div>
</form>



@endsection