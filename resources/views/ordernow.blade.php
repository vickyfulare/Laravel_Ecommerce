@extends('master')
@section('content')
<div class="container mt-5 order-now">
    <h2 class="mb-4">Order Summary</h2>
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow-sm p-4">
                <h4>Total Amount: <span class="text-success">₹ {{ $total }}</span></h4>
                <hr>
                <form action="/orderplace" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Delivery Address</label>
                        <textarea name="address" id="address" class="form-control" placeholder="Enter your delivery address" required></textarea>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="payment" class="form-label">Payment Method</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" value="online" id="online" required>
                            <label class="form-check-label" for="online">Online Payment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" value="cash" id="cod" required>
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-100">Place Order</button>
                </form>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card shadow-sm p-4">
                <h4>Order Details</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Price</span>
                        <span>₹ {{ $total }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tax</span>
                        <span>₹ 0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Delivery Charges</span>
                        <span>₹ 100</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Total Payable</span>
                        <span>₹ {{ $total + 100 }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
