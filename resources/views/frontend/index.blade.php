@extends('layouts.front')

@section('title')
    Welcome to eCommerce
@endsection

@section('content')
    @include('layouts.include.slider')
    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="mb-3">Featured product</h2>
                <div class="featured-carousel owl-theme owl-carousel">
                    @foreach ( $featured_products as $prod)
                        <div class="item">
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
    </div>
@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })  
</script>
@endsection