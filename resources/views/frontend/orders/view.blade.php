@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white">Order View
                            <a href="{{ url('my-orders')}}" class="text-white btn btn-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 oder-details">
                                <h4>Shipping details</h4>
                                <hr>
                                <label for="">First name</label>
                                <div class="border">{{ $orders->fname }}</div>
                                <label for="">Last name</label>
                                <div class="border">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border">{{ $orders->email }}</div>
                                <label for="">Contact no</label>
                                <div class="border">{{ $orders->phone }}</div>
                                <label for="">Shipping adress</label>
                                <div class="border">{{ $orders->adress1 }},{{ $orders->adress2 }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }} </td>
                                                <td>{{ $item->price }} $</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" alt="Product image" width="50px">
                                                 </td>                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Grand total: <span class="float-end">{{ $orders->total_price }} $</span></h4>
                            </div>
                        </div>    
                    </div>
                </div>      
            </div>
        </div>
    </div>
@endsection