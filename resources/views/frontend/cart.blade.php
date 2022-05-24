@extends('layouts.front')

@section('title')
My cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-info border-top">
    <div class="container">
        <h6 class="mb-0">
            <a class="text-white fs-5 text text-decoration-none" href="{{ url('/') }}">
                Home /
            </a> 
            <a class="text-white fs-5 text text-decoration-none" href="{{ url('cart') }}">
                Cart
            </a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow product_data">
        @if ($cartitems->count() > 0)     
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ( $cartitems as $item )
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}"  width="70px" height="70px" alt="">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }} </h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->products->selling_price }} $</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if ($item->products->qty >= $item->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px">
                                    <button class="input-group-text changeQty decrement-btn">-</button>
                                    <input type="text" name="quantity " value="{{ $item->prod_qty }}" class="qty-input form-control">
                                    <button class="input-group-text changeQty increment-btn">+</button>
                                </div>
                                @php
                                    $total += $item->products->selling_price * $item->prod_qty;
                                @endphp 
                            @else 
                                <h6>Out of stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-sm btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>   
                    
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total price: {{ $total }} $
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success">Proceed to checkout</a>
                </h6>   
            </div>
        @else
            <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty </h2>
                <a href="{{ url('category') }}"><button class="btn btn-outline-primary float-end" >Continue shopping</button></a>
            </div>
        @endif

    </div>
</div>
@endsection