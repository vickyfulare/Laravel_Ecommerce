@extends('master')

@section('content')
<div class="container my-4 my-orders">
    <h2 class="text-center mb-4">My Orders</h2>

    @if(count($orders) > 0)
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Delivery Status</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $order->gallery) }}" alt="Product Image" width="80" height="80" style="border-radius:5px;">
                        </td>
                        <td>{{ $order->name }}</td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'Delivered') bg-success 
                                @elseif($order->status == 'Pending') bg-warning 
                                @else bg-secondary @endif">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>{{ $order->payment }}</td>
                        <td>
                            <span class="badge 
                                @if($order->payment_status == 'Paid') bg-success 
                                @else bg-danger @endif">
                                {{ $order->payment_status }}
                            </span>
                        </td>
                        <td>₹{{ number_format($order->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info text-center">
            <h5>No orders found!</h5>
            <p>Looks like you haven't placed any orders yet.</p>
        </div>
    @endif
</div>
@endsection
