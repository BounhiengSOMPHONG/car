@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <div class="row mb-5">
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <h4 class="font-weight-normal mb-3">total order<i class="mdi mdi-chart-line mdi-24px float-end"></i>
              </h4>
              <h2 class="mb-5">{{$orderCount}}</h2>
              <h6 class="card-text"></h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <h4 class="font-weight-normal mb-3">total manager <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
              </h4>
                <h2>
                  @if ($managertotal==0)
                  <h2>0</h2>
                  @else
                  {{$managertotal}}
                  @endif
                </h2>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <h4 class="font-weight-normal mb-3">total car <i class="mdi mdi-diamond mdi-24px float-end"></i>
              </h4>
              @if ($cartotal==0)
                  <h2>0</h2>
                  @else
                  <h2 class="mb-5">{{$cartotal}}</h2>
                  @endif
            </div>
          </div>
        </div>
      </div>
@stop

@section('content')
<h2 >Newest order list</h2>
<p class="mb-2">check order menu for more</p>
<div class="container">
    <table rows=5 class=" table table-bordered">
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Car Name</th>
                <th>Location</th>
                <th>Pickup</th>
                <th>Dropoff</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderdata as $order)
                <tr>
                    <td>{{ $order->booking->book_id }}</td>
                    <td>{{ $order->booking->customer->first_name }} {{ $order->booking->customer->last_name }}</td>
                    <td>{{ $order->booking->customer->email }}</td>
                    <td>{{ $order->booking->car->car_name }}</td>
                    <td>{{ $order->booking->Location }}</td>
                    <td>{{ $order->booking->Pickup }}</td>
                    <td>{{ $order->booking->dropoof }}</td>
                    <td>{{ number_format($order->total, 3) }} KIP</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
