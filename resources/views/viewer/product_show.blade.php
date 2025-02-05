@extends('layouts.app')

@section('page_title', 'Incubatee Products')

@section('content')
    <div class="container mt-4">
        <h1>Products for {{ $incubatee->incubatee_name }}</h1>

        @if($incubatee->products->isEmpty())
            <p>No products available for this incubatee.</p>
        @else
            <div class="row">
                @foreach ($incubatee->products as $incubateeProduct)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                            <img src="{{ $incubateeProduct->product_image ? asset('storage/' . $incubateeProduct->product_image) : asset('storage/default_product_image.png') }}" 
                                 class="card-img-top" alt="{{ $incubateeProduct->product_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $incubateeProduct->product_name }}</h5>
                                <p class="card-text">{{ $incubateeProduct->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        @endif
        
    </div>
@endsection
