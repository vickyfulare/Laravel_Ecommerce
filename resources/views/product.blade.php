@extends('master')

@section('content')
<style>
    /* 🔹 Make carousel images responsive */
    .carousel-item img {
        width: 100%;
        height: 550px;
        object-fit: cover;
    }

    /* 🔹 Carousel captions */
    .carousel-caption {
        background: rgba(0, 0, 0, 0.4);
        padding: 20px;
        border-radius: 10px;
    }

    /* 📱 Small devices (up to 576px) */
    @media (max-width: 576px) {
        .carousel-item img {
            height: 200px; /* Reduce height for small screens */
        }
        .carousel-caption h1 {
            font-size: 15px;
        }
        .carousel-caption p {
            font-size: 10px;
        }
        .carousel-caption a {
            font-size: 10px;
            padding: 6px 12px;
        }
    }

    /* 📲 Tablets (576px - 768px) */
    @media (min-width: 576px) and (max-width: 768px) {
        .carousel-item img {
            height: 300px;
        }
        .carousel-caption h1 {
            font-size: 17px;
        }
        .carousel-caption p {
            font-size: 12px;
        }
        .carousel-caption a {
            font-size: 12px;
            padding: 8px 14px;
        }
    }

    /* 💻 Laptops (768px - 1200px) */
    @media (min-width: 768px) and (max-width: 1200px) {
        .carousel-item img {
            height: 450px;
        }
        .carousel-caption h1 {
            font-size: 28px;
        }
        .carousel-caption p {
            font-size: 16px;
        }
        .carousel-caption a {
            font-size: 16px;
            padding: 10px 18px;
        }
    }

    /* 🖥️ Large screens (1200px and above) */
    @media (min-width: 1200px) {
        .carousel-item img {
            height: 550px;
        }
    }
</style>

<div class="custom-product">

    <!-- Full-Width Carousel -->
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2"></button>
        </div>

        <!-- Carousel Images -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/img1.jpg') }}" alt="Sale Banner 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold">Mega Shopping Sale</h1>
                    <p class="fs-5">Up to 50% OFF on top brands. Limited time only!</p>
                    <a href="{{ session()->has('user') ? '/all-products' : '/login' }}" class="btn btn-danger btn-lg shadow">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/img2.jpg') }}" alt="Sale Banner 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold">New Arrivals are Here</h1>
                    <p class="fs-5">Trendy collections to upgrade your wardrobe today.</p>
                    <a href="{{ session()->has('user') ? '/all-products' : '/login' }}" class="btn btn-primary btn-lg shadow">Explore Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/img3.jpg') }}" alt="Sale Banner 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold">Big Festive Discounts</h1>
                    <p class="fs-5">Grab the hottest deals before they’re gone!</p>
                    <a href="{{ session()->has('user') ? '/all-products' : '/login' }}" class="btn btn-warning btn-lg shadow">Start Shopping</a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Welcome Section -->
    <section class="py-5 text-center bg-light">
        <div class="container">
            <h2 class="fw-bold">Welcome to Our Shopping Store</h2>
            <p class="lead mt-3">
                Discover the latest trends, explore exciting deals, and experience hassle-free shopping.
                We bring you the best products at unbeatable prices.
            </p>
            <a href="{{ session()->has('user') ? '/all-products' : '/login' }}" class="btn btn-success btn-lg mt-3 shadow">Browse Products</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow p-4">
                        <h4 class="fw-bold">Free Shipping</h4>
                        <p>Enjoy free delivery on all orders above ₹999.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow p-4">
                        <h4 class="fw-bold">Best Offers</h4>
                        <p>Grab exclusive deals and discounts every day.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow p-4">
                        <h4 class="fw-bold">24/7 Support</h4>
                        <p>We’re here to help you anytime, anywhere.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
