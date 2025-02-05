@extends('layouts.admin')
@section('page_title', 'Product')
@section('content')
    <div class="row mt-4">
            <div class="col-md-3 mb-4">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                        <img src="{{ $incubateeproduct->product_image ? asset('storage/' . $incubateeproduct->product_image) : asset('storage/default_image.png') }}" 
                             class="card-img-top" alt="{{ $incubateeproduct->product_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $incubateeproduct->product_name }}</h5>
                            <p class="card-text">{{ $incubateeproduct->description }}</p>
                        </div>  
                    </div>
                </a>
            </div>
    </div>
@endsection