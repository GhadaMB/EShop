@extends('layouts.front')

@section('title', $product->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">collections / {{ $product->category->name }} / {{ $product->name }}</h6>
        </div>
    </div>

    <div class="container">
        <div class="col-md-11 mx-auto">
        <div class="card shadow product_data">
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/'. $product->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            @if( $product->trending == '1')
                                <label style="font-size:16px;" class="float-end badge bg-danger trending-tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{ $product->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rs {{ $product->selling_price }}</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if($product->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input"/>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br/>
                                <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                                <button type="button" class="btn btn-success me-3 float-start">Add To Wishlist <i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <h3>Description</h3>
                        <p class="mt-3">
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // ADD To Cart Button
            $('.addToCartBtn').click(function (e){
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '/add-to-cart',
                    data: {
                        'product_id' : product_id,
                        'product_qty' : product_qty
                    },
                    success: function (response){
                        swal(response.status);
                    }
                });
            });

            // Increase Quantity Button
            $('.increment-btn').click(function(e){
                e.preventDefault();

                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;

                if(value < 10) {
                    value++;
                    $('.qty-input').val(value);
                }
            });

            // Decrease Quantity Button
            $('.decrement-btn').click(function(e){
                e.preventDefault();

                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;

                if(value > 1) {
                    value--;
                    $('.qty-input').val(value);
                }
            });
        });
    </script>
@endsection
