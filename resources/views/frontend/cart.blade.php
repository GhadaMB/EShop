@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a class="cat_link" href="{{ url('/') }}">
                    Home
                </a> /
                <a class="cat_link" href="{{ url('cart') }}">
                    Cart
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="col-md-11 mx-auto">
            <div class="card shadow">
                <div class="card-body pt-3">
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="70px" width="70px" alt="Image here">
                            </div>
                            <div class="col-md-3 my-auto">
                                <br>
                                <h6>{{ $item->products->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <br>
                                <h6>Rs {{ $item->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if( $item->products->qty > $item->prod_qty )
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width:130px;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" value="{{ $item->prod_qty }}" class="form-control qty-input"/>
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                                @else
                                    <h6>Out Of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <br>
                                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <h6>Total Price : Rs {{ $total }}
                        <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed To Checkout</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endsection
