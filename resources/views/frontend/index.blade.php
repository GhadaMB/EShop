@extends('layouts.front')

@section('title')
    welcome to E-shop
@endsection

@section('content')
    @include('layouts.inc.front.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel owl-theme featured-carousel">
                    @foreach($featured_products as $product)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'. $product->image) }}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $product->name }}</h5>
                                    <span class="float-start">{{ $product->selling_price }}</span>
                                    <span class="float-end"><s>{{ $product->original_price }}</s></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel owl-theme trending-carousel">
                    @foreach($trending_categories as $cate)
                        <div class="item">
                            <a href="{{ url('view-category/'. $cate->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'. $cate->image) }}" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{ $cate->name }}</h5>
                                        <p>{{ $cate->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Carousel for products
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })

        // Carousel for categories
        $('.trending-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection
