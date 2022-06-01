@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Olib borilishi kerak bo'lgan tovarlar
                            {{-- <a href="{{ url('order-history')}}" class="text-white btn btn-dark float-end">Order history</a> --}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }} $</td>
                                        {{-- <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td> --}}
                                        <td>
                                            @if ( $item->status == '0' )
                                                Qadoqlash jarayonida
                                            @elseif( $item->status == '1' )
                                                Yo'lda  
                                            @else
                                                Yetkazildi
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Yo'ldagi tovarlar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders_one as $item)
                                    <tr>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }} $</td>
                                        <td>
                                            @if ( $item->status == '0' )
                                                Qadoqlash jarayonida
                                            @elseif( $item->status == '1' )
                                                Yo'lda  
                                            @else
                                                Yetkazildi
                                            @endif
                                        </td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Yetkazilgan tovarlar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders_two as $item)
                                    <tr>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }} $</td>
                                        {{-- <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td> --}}
                                        <td>
                                            @if ( $item->status == '0' )
                                                Qadoqlash jarayonida
                                            @elseif( $item->status == '1' )
                                                Yo'lda   
                                            @else
                                                Yetkazildi
                                            @endif
                                        </td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>



@endsection