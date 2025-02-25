@extends('layouts.app')
@section('page_title', $incubatee->incubatee_name)
@section('content')

<style>
    body {
        margin: 1rem;
    }

    .profile-image {
        height: 150px;
        width: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #236903;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .col-md-4 {
        border-right: 2px solid #ddd;
    }

    .profile-info {
        text-align: center;
    }

    .total-products {
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

    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        padding-top: 20px;
    }

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
</style>

<div class="row mt-4">
    <div class="col-md-4 profile-info text-center">
        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" 
             class="profile-image img-fluid rounded-circle" 
             alt="{{ $incubatee->incubatee_name }}" style="width: 150px; height: 150px; object-fit: cover;">

        <h1 class="mt-3">{{ $incubatee->incubatee_name }}</h1>
        <h3 class="text-muted">Business Name: {{ $incubatee->business_name }}</h3>
        <p>{{ $incubatee->description ?? 'No description available.' }}</p>
        
        <h1>{{ $incubatee->incubateeProducts->count() }}</h1>
        <h5>Total Products</h5>

        <ul class="list-unstyled mt-3">
            <li><i class="fas fa-map-marker-alt"></i> Location: {{ $incubatee->location ?? 'Not provided' }}</li>
            <li><i class="fas fa-users"></i> Incubatee Type: {{ $incubatee->incubatee_type ?? 'Not specified' }}</li>
        </ul>
    </div>

    <div class="col-md-8">
        <h2 class="mb-3">Products:</h2>
        
        @if($incubatee->incubateeProducts && $incubatee->incubateeProducts->isNotEmpty())
            <div class="row">
                @foreach($incubatee->incubateeProducts as $product)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <a href="{{ route('viewer.product_show', $product->id) }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('storage/default_image.png') }}" 
                                     class="card-img-top" 
                                     alt="{{ $product->product_name }}" 
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">No products available at the moment.</p>
        @endif
    </div>
</div>
@endsection

@extends('layouts.footer')
