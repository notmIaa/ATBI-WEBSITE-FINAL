@extends('layouts.app')
@section('page_title', $incubatee->incubatee_name)
@section('content')

<style>
    body {
        margin: 1rem;
    }

    /* Profile Picture Styling */
    .profile-image {
        height: 200px;
        width: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #236903;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Column Styling */
    .col-md-4 {
        border-right: 2px solid #ddd;  /* Light gray border */
    }

    /* Center Profile Information */
    .profile-info {
        text-align: center;
    }

    /* Total Products Box Styling */
    .total-products {
        background-color: none;
        color: #080000;
        width: 100px;
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 2.5rem;
        font-weight: 700;
        margin-top: 20px;
    }

    .total-products h1 {
        font-size: 2.5rem;
        margin: 0;
    }

    .total-products h5 {
        font-size: 1rem;
        margin: 0;
    }

    /* Additional Info Left Aligned */
    .profile-info ul {
        text-align: left;
    }

    /* Product Grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        padding-top: 20px;
    }

    /* Card Styling */
    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-card img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .product-card:hover {
        transform: scale(1.05);
    }

    .product-card .card-body {
        text-align: center;
        padding: 15px;
    }

    /* Title styling */
    h1 {
        font-size: 1.8rem;
        font-weight: 900;
    }

    h3 {
        font-size: 1.2rem;
        font-weight: 500;
    }
</style>

<div class="row mt-4">
    <!-- Profile Information Column (Static) -->
    <div class="col-md-4 profile-info">
        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" 
             class="profile-image" alt="{{ $incubatee->incubatee_name }}">

        <h1 class="mt-3">{{ $incubatee->incubatee_name }}</h1>
        <h3 class="text-muted">Business Name: {{ $incubatee->business_name }}</h3>
        <p>{{ $incubatee->description ?? 'No description available.' }}</p>

        <!-- Total Products Section -->
        <div class="total-products">
            <h1>{{ $incubatee->products->count() }}</h1>
            <h5>Total Products</h5>
        </div>

        <!-- Additional Information (Location, Incubatee Type) -->
        <ul class="list-unstyled mt-3">
            <li><i class="fas fa-map-marker-alt"></i> Location: {{ $incubatee->location ?? 'Not provided' }}</li>
            <li><i class="fas fa-users"></i> Incubatee Type: {{ $incubatee->incubatee_type ?? 'Not specified' }}</li>
        </ul>
    </div>

    <!-- Products Column (Grid Layout) -->
    <div class="col-md-8">
        <h2>Products:</h2>
        @if($incubatee->products->isEmpty())
            <p class="text-center text-muted">No products available at the moment.</p>
        @else
            <div class="product-grid">
                @foreach($incubatee->products as $product)
                    <div class="product-card">
                        <a href="{{ route('viewer.product_show', $product->id) }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('storage/default_image.png') }}" 
                                 alt="{{ $product->product_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
