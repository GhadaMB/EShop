@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body pt-3">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">County</label>
                                <input type="text" class="form-control" placeholder="Enter Country">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">PIN Code</label>
                                <input type="text" class="form-control" placeholder="Enter PIN Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body pt-3">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->products->selling_price }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button class="btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
