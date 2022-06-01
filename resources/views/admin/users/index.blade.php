@extends('layouts.admin')
@section('content')
<div class=" bg-white">
    <h3>
        Registered users
    </h3>
    <hr>
    <table class="table table-border">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{ url('view-users/'.$item->id) }}" class="btn btn-primary btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
    
@endsection