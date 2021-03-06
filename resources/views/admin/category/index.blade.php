@extends('layouts.admin')
@section('content')
<div class=" bg-dark">
    <h3>
        Category Page
    </h3>
    <table class="table table-border">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img class="cate-image" src="{{ asset('assets/uploads/category/'.$item->image) }}" alt="">
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger tn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
    
@endsection