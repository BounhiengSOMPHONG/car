@extends('adminlte::page')

@section('title', 'Order List')

@section('content_header')
    <h1>Order List</h1>
@stop

@section('content')
<div class=" mt-3">
    <h2 class="mb-4">Your Order List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Car Name</th>
                <th>Location</th>
                <th>Pickup</th>
                <th>Dropoff</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderdata as $order)
                <tr>
                    <td>{{ $order->booking->book_id }}</td>
                    <td>{{ $order->booking->customer->first_name }} {{ $order->booking->customer->last_name }}</td>
                    <td>{{ $order->booking->customer->phone_number }}</td>
                    <td>{{ $order->booking->customer->email }}</td>
                    <td>{{ $order->booking->car->car_name }}</td>
                    <td>{{ $order->booking->Location }}</td>
                    <td>{{ $order->booking->Pickup }}</td>
                    <td>{{ $order->booking->dropoof }}</td>
                    <td>{{ $order->booking->start }}</td>
                    <td>{{ $order->booking->end }}</td>
                    <td>{{ number_format($order->total, 3) }} KIP</td>
                </tr>
                
            @endforeach
            
        </tbody>
    </table>
    {!!$orderdata->links('pagination::bootstrap-5')!!}
</div>

@stop

@section('css')
    {{-- Add your custom CSS here --}}
@stop

@section('js')
    <script>
        console.log("Sales data and order list loaded.");
    </script>
@stop
