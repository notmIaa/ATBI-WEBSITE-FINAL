@extends('layouts.app')
@section('page_title', 'Incubatee Products')
@section('content')



    <div class="container mt-4">
        <h1>Products for {{ $incubatee->incubatee_name }}</h1>

        @if($incubatee->products->isEmpty())
            <p>No products available for this incubatee.</p>
        @else
            @foreach ($incubatee->products as $incubateeProduct)
                <div class="row mb-4 p-3 border rounded shadow-sm" style="background-color: #fff;">
                    <!-- Product Image on the Left -->
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ $incubateeProduct->product_image ? asset('storage/' . $incubateeProduct->product_image) : asset('storage/default_product_image.png') }}" 
                             class="img-fluid rounded" 
                             alt="{{ $incubateeProduct->product_name }}" 
                             style="max-width: 100%; height: auto; object-fit: cover;">
                    </div>
                    
                    <!-- Divider -->
                    <div class="col-md-1 d-flex align-items-center">
                        <div class="border-end" style="height: 100%; width: 2px; background-color: #ddd;"></div>
                    </div>
                    
                    <!-- Product Details on the Right -->
                    <div class="col-md-7">
                        <h4><strong>Product Name:</strong> {{ $incubateeProduct->product_name }}</h4>
                        <p><strong>Ingredients:</strong> {{ $incubateeProduct->ingredients }}</p>
                        <p><strong>Net Weight:</strong> {{ $incubateeProduct->net_weight }}</p>
                        <p><strong>Description:</strong> {{ $incubateeProduct->description }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@include('layouts.footer')
@endsection

