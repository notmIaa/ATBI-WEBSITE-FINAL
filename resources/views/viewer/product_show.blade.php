@extends('layouts.app')

@section('page_title', 'Incubatee Products')

@section('content')
    <div class="container mt-4">
        <h1>Products for {{ $incubateeproduct->incubatee_name }}</h1>

        @if(!$incubateeproduct || !$incubateeproduct->product_name)
            <p>No products available for this incubatee.</p>
        @else
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                        <img src="{{ $incubateeproduct->product_image ? asset('storage/' . $incubateeproduct->product_image) : asset('storage/default_product_image.png') }}" 
                             class="card-img-top" alt="{{ $incubateeproduct->product_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $incubateeproduct->product_name }}</h5>
                            <p class="card-text">{{ $incubateeproduct->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

