@extends('layouts.admin')
@section('content')
<div class=" bg-danger">
    <h3>
        Product Page
    </h3>
    <table class="table table-border">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Name</th>
                <th>Selling price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->selling_price }}</td>
                    <td>
                        <img class="cate-image" src="{{ asset('assets/uploads/products/'.$item->image) }}" alt="">
                    </td>
                    <td>
                        <a href="{{ url('edit-prod/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
    
@endsection