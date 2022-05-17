@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 class="mb-3"> {{ $category->name }}</h2>
                @foreach ( $products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="product image">
                            <div class="card-body">
                                <h3>{{ $prod->name }}</h3>
                                <span class="float-start"><s>{{ $prod->original_price }} usd</s></span>
                                <span class="float-end">{{ $prod->selling_price }} usd</span>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>


@endsection