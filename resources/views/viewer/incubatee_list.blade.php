@extends('layouts.app')
@section('page_title', 'BSU-Agribased Technology Business Incubator')
@section('content')
    <div class="row mt-4">
        @foreach ($incubatees as $incubatee)
            <div class="col-md-3 mb-4">
                <a href="{{ route('viewer.incubatee_show', $incubatee->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" 
                             class="card-img-top" alt="{{ $incubatee->incubatee_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $incubatee->incubatee_name }}</h5>
                            <p class="card-text">{{ $incubatee->business_name }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
