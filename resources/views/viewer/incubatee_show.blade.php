@extends('layouts.app')
@section('page_title', $incubatee->incubatee_name)
@section('content')
    <div class="row mt-4">
        <div class="col-md-12 text-center">
        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" 
        class="card-img-top" alt="{{ $incubatee->incubatee_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
            <h1>{{ $incubatee->incubatee_name }}</h1>
            <h3>Business Name: {{ $incubatee->business_name }}</h3>
        </div>
    </div>

    <div class="row mt-4">
        <h2 class="col-12">Products:</h2>
        @foreach($incubatee->products as $product)
            <div class="col-md-3 mb-4">
            <a href="{{ route('viewer.product_show', $product->id) }}" style="text-decoration: none; color: inherit;">
                <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                <img src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('storage/default_image.png') }}" 
                         class="card-img-top" alt="{{ $product->product_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
