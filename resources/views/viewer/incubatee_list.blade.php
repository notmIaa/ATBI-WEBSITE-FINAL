@extends('layouts.app')
@section('page_title', 'BSU-Agribased Technology Business Incubator')
@section('content')
    <style>
        /* Hero Banner Styling */
        .hero-banner {
            background-image: url('{{ asset('storage/hero_banner.jpg') }}');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 60px 20px;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hero-banner h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .hero-banner p {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .hero-banner a {
            padding: 10px 20px;
            background-color: #109919;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .hero-banner a:hover {
            background-color: #0c7a14;
        }

        /* Layout Styling */
        .incubatee-container {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
            gap: 2rem;
            padding: 1rem;
        }

        .filter-sidebar {
            width: 250px;
            padding: 1rem 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .filter-tab {
            padding: 10px 20px;
            border-left: 3px solid transparent;
            background-color: #f5f5f5;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
            font-weight: bold;
            margin: 0;
            border-radius: 0;
        }

        .filter-tab.active {
            background-color: #fff;
            border-left-color: #109919;
            color: #109919;
        }

        .incubatee-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding: 1rem;
            box-sizing: border-box;
        }

        .incubatee-card {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #109919;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 800px;
        }

        .incubatee-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .incubatee-card img {
            height: 80px;
            width: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 15px;
        }

        .incubatee-card .card-title {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .incubatee-card .card-text {
            font-size: 1rem;
            color: #555;
        }

        @media (max-width: 820px) {
            .incubatee-container {
                flex-direction: column;
                align-items: center;
            }

            .filter-sidebar {
                width: 100%;
            }
        }

        /* Testimonial Section */
        .testimonial-section {
            text-align: center;
            padding: 2rem 0;
            background-color: #f9f9f9;
        }

        .testimonial-card {
            display: inline-block;
            max-width: 600px;
            padding: 1rem;
            border-left: 4px solid #109919;
            margin: 0 1rem;
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            justify-content: space-around;
            padding: 2rem 0;
            background-color: #109919;
            color: white;
        }

        .stats-item {
            text-align: center;
        }

        .stats-item h2 {
            font-size: 2.5rem;
        }
    </style>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <h1>Welcome to BSU-Agribased Technology Business Incubator</h1>
        <p>Empowering agribased startups and innovators to grow and thrive.</p>
        <a href="#incubatee-section">Explore Incubatees</a>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="stats-item">
            <h2>50+</h2>
            <p>Incubatees</p>
        </div>
        <div class="stats-item">
            <h2>30+</h2>
            <p>Graduates</p>
        </div>
        <div class="stats-item">
            <h2>10</h2>
            <p>Years of Impact</p>
        </div>
    </div>

    <!-- Main Container -->
    <div class="incubatee-container">
        <!-- Incubatee List Section -->
        <div class="incubatee-list" id="incubatee-section">
            <input type="text" id="search" placeholder="Search by business or incubatee name..." onkeyup="filterCards()">
            @foreach ($incubatees as $incubatee)
                <a href="{{ route('viewer.incubatee_show', $incubatee->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="incubatee-card" data-business-name="{{ $incubatee->business_name }}" data-incubatee-name="{{ $incubatee->incubatee_name }}" data-created-at="{{ $incubatee->created_at }}">
                        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" alt="{{ $incubatee->incubatee_name }}">
                        <div>
                            <h5 class="card-title">{{ $incubatee->business_name }}</h5>
                            <p class="card-text">{{ $incubatee->incubatee_name ?? 'Not available' }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script>
        function filterCards() {
            const searchValue = document.getElementById('search').value.toLowerCase();
            const cards = document.querySelectorAll('.incubatee-card');

            cards.forEach(card => {
                const businessName = card.dataset.businessName.toLowerCase();
                const incubateeName = card.dataset.incubateeName.toLowerCase();
                card.parentElement.style.display = (businessName.includes(searchValue) || incubateeName.includes(searchValue)) ? '' : 'none';
            });
        }

        function sortCards() {
            const sortValue = document.getElementById('sort').value;
            const container = document.querySelector('.incubatee-list');
            const cards = Array.from(container.querySelectorAll('.incubatee-card'));

            cards.sort((a, b) => {
                if (sortValue === 'recently_added') {
                    return new Date(b.dataset.createdAt) - new Date(a.dataset.createdAt);
                } else if (sortValue === 'business_name_asc') {
                    return a.dataset.businessName.toLowerCase().localeCompare(b.dataset.businessName.toLowerCase());
                } else if (sortValue === 'business_name_desc') {
                    return b.dataset.businessName.toLowerCase().localeCompare(a.dataset.businessName.toLowerCase());
                } else if (sortValue === 'incubatee_name_asc') {
                    return a.dataset.incubateeName.toLowerCase().localeCompare(b.dataset.incubateeName.toLowerCase());
                } else if (sortValue === 'incubatee_name_desc') {
                    return b.dataset.incubateeName.toLowerCase().localeCompare(a.dataset.incubateeName.toLowerCase());
                }
            });

            cards.forEach(card => container.appendChild(card.parentElement));
        }
    </script>
@endsection
