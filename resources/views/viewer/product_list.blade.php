@extends('layouts.app')
@section('page_title', 'BSU-Agribased Technology Business Incubator')
@section('content')
    <style>
        /* Card Styling */
        .incubatee-card {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #109919;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: .5rem;
            margin-bottom: 1rem;
            width: 70%;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover transition */
        }

        /* Profile Picture Styling */
        .incubatee-card img {
            height: 80px;
            width: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 15px;
        }

        /* Text Content Styling */
        .incubatee-card div {
            font-size: 1rem;
        }

        .incubatee-card .card-title {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .incubatee-card .card-text {
            font-size: 1rem;
            color: #555;
        }

        /* Hover Effect */
        .incubatee-card:hover {
            transform: translateY(-5px);  /* Slightly lift the card */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
        }

        /* Flexbox Centering */
        .row.mt-4 {
            display: flex;
            justify-content: center;  /* Centers the content horizontally */
            flex-wrap: wrap;  /* Allows cards to wrap onto the next row if needed */
        }

        .col-md-12 {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="row mt-4">
        @foreach ($incubatees as $incubatee)
            <div class="col-md-12 mb-4">
                <a href="{{ route('viewer.incubatee_show', $incubatee->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="incubatee-card">
                        <!-- Profile Picture: Circular -->
                        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" 
                             alt="{{ $incubatee->incubatee_name }}">

                        <!-- Incubatee Info -->
                        <div>
                            <h5 class="card-title">{{ $incubatee->business_name }}</h5>
                            <p class="card-text"> {{ $incubatee->incubatee_name ?? 'Not available' }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
