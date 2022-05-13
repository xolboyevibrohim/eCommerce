@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>All category</h3>
                    <div class="row">
                        @foreach ($category as $item)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$item->image) }}" alt="product image">
                                    <div class="card-body">
                                        <h3>{{ $item->name }}</h3>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection