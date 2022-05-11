@extends('layouts.admin')

@section('content')

<div class="bg bg-dark">
    <h3 class="bg bg-white">Add category</h3>
</div>
<form action="{{ route('insert') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row ">
        <div class="col-md-6 mb-3 ">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-md-6 mb-3 ">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Description</label>
            <textarea rows="3" class="form-control" name="description"></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input type="checkbox" name="status">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Popular</label>
            <input type="checkbox" name="popular">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta_title</label>
            <input type="text" class="form-control" name="meta_title">
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta_descrip</label>
            <textarea rows="3" class="form-control" name="meta_descrip"></textarea>
        </div>
        <div class="col-md-12 mb-3">
            <label for="">Meta_keywords</label>
            <textarea rows="3" class="form-control" name="meta_keywords"></textarea>
        </div>

        <div class="col-md-12 mb-3">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
</form>



@endsection