@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-info border-top">
    <div class="container">
        <h6 class="mb-0">
            <a class="text-white fs-5 text text-decoration-none" href="{{ url('/') }}">
                Home /
            </a> 
            <a class="text-white fs-5 text text-decoration-none" href="{{ url('checkout') }}">
                Checkout /
            </a> 
            
        </h6>
    </div>
</div>
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter First name" name="fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Last name" name="lname">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone number</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone number" name="phone">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control" placeholder="Enter Address 1" name="adress1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control" placeholder="Enter Address 2" name="adress2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order details</h6>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_item as $item )
                                        <tr>
                                            <td>
                                                {{ $item->products->name }}
                                            </td>
                                            <td>
                                                {{ $item->prod_qty }}
                                            </td>
                                            <td>
                                                {{ $item->products->selling_price }} $
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn col-md-12 btn-primary float-end">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection