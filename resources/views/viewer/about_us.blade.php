@extends('layouts.app')
@section('page_title', 'About Us - BSU-Agribased Technology Business Incubator')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fa;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .hero {
        background: url('{{ asset('images/ABOUT US.svg') }}') no-repeat center center;
        color: white;
        text-align: center;
        padding: 120px 20px;
        background-size: cover;
    }

    .hero h1 {
        font-size: 4rem;
        font-weight: bold;
        margin: 0;
    }

    .hero p {
        font-size: 1.5rem;
        font-weight: 300;
        margin-top: 10px;
    }

    .vmg-container {
        display: flex;
        flex-wrap: wrap;
        gap: 5rem;
        padding: 5rem 5rem;
        align-items: center;
        background: #05ff1521;
        
    }

    .vmg-left {
        flex: 1;
        min-width: 500px;
    }

    .vmg-right {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}
    

    .vmg-box {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
        margin: 1rem;
    }

    .vmg-box:hover {
        transform: translateY(-10px);
    }

    .vmg-box i {
        font-size: 2rem;
        color: #006900;
        margin-bottom: 10px;
    }

    .carousel {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        overflow: hidden; /* Ensures only one carousel item is visible at a time */
    }

    .carousel-inner {
        display: flex; /* Makes items align horizontally */
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item {
        min-width: 100%; /* Each item should take up the full width */
        box-sizing: border-box;
        text-align: center;
        padding: 20px;
    }

    .carousel-controls {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
        z-index: 10;
    }

    .carousel-controls button {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .carousel-indicators {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 5px;
    }

    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #007BFF;
        opacity: 0.5;
        border: none;
        cursor: pointer;
    }

    .carousel-indicators button.active {
        opacity: 1;
    }



    .objectives-section {
    background: #e6ffe68b;
    padding: 5rem 5rem;
    border-radius: 10px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    color: rgb(3, 120, 34);
    font-family: "Outfit", serif;
}

    .objectives-section h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: #027100;
        font-weight: 700;
        font-family: "Outfit", serif;
        text-align: center;

    }

    .objectives-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .objectives-list li {
        font-size: 1.2rem;
        padding: 10px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .objectives-list i {
        color: #007BFF;
        font-size: 1.5rem;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.2rem;
        }
    }
</style>

<div class="hero">
    <h1>About BSU-ATBI</h1>
    <p>Empowering Agribusiness Through Innovation & Technology</p>
</div>

<div class=".about">
    <section class="vmg-container">
        <div class="vmg-left">
            <h5>ABOUT US</h5>
            <h3>Benguet State University</h3>
            <h1>Agribased Technology Business Incubator/Innovation Center</h1>
            <p>BSU Agribased Technology Business Incubator/Innovation Center is dedicated to fostering agricultural innovation and sustainability.</p>
        </div>
        <div class="vmg-right">
            <div class="vmg-box">
                <i class="fas fa-eye"></i>
                <h3>Vision</h3>
                <p>Prosperous and productive Cordillera through agribusiness incubation.</p>
            </div>
            <div class="vmg-box">
                <i class="fas fa-bullseye"></i>
                <h3>Mission</h3>
                <p>Creating socio-economic growth through innovation and entrepreneurship.</p>
            </div>
            <div class="vmg-box">
                <i class="fas fa-flag"></i>
                <h3>Goals</h3>
                <p>Increase income and improve living standards for clients.</p>
            </div>
            <div class="vmg-box">
                <i class="fas fa-handshake"></i>
                <h3>Core Values</h3>
                <p>Integrity, sustainability, and excellence.</p>
            </div>
        </div>
    </section>
</div>

<div class="objectives">
    <section class="objectives-section">
        <h2>Objectives</h2>
        <ul class="objectives-list">
            <li><i class="fas fa-tools"></i> Develop technical and entrepreneurial skills.</li>
            <li><i class="fas fa-university"></i> Enhance links between universities, research institutions, and industry.</li>
            <li><i class="fas fa-briefcase"></i> Encourage employment and entrepreneurship opportunities.</li>
            <li><i class="fas fa-seedling"></i> Support 50 smallholder startups every 5-7 years.</li>
        </ul>
    </section>
</div>

<div class="about">
    <section class="objectives-section">
        <h2>Technical Services</h2>
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <i class="fas fa-cogs"></i>
                    <h3>Technology Business Incubation</h3>
                </div>
                <div class="carousel-item">
                    <i class="fas fa-seedling"></i>
                    <h3>Provided consultancy for Food Processing Incubation</h3>
                </div>
                <div class="carousel-item">
                    <i class="fas fa-file-alt"></i>
                    <h3>Business Proposal</h3>
                </div>
            </div>
            <div class="carousel-controls">
                <button onclick="moveSlide(-1)">&#10094;</button>
                <button onclick="moveSlide(1)">&#10095;</button>
            </div>
            <div class="carousel-indicators"></div>
        </div>
    </section>
</div>

<script>
    let index = 0;

    // Function to move to the next/previous slide
    function moveSlide(step) {
        const items = document.querySelectorAll('.carousel-item');
        index = (index + step + items.length) % items.length; // Wrap around
        document.querySelector('.carousel-inner').style.transform = `translateX(-${index * 100}%)`;
        updateIndicators();
    }

    // Function to update the carousel indicators
    function updateIndicators() {
        const indicators = document.querySelector('.carousel-indicators');
        indicators.innerHTML = ''; // Clear previous indicators
        const items = document.querySelectorAll('.carousel-item');
        items.forEach((item, i) => {
            const button = document.createElement('button');
            button.classList.add(i === index ? 'active' : ''); // Highlight current slide
            button.onclick = () => moveSlide(i - index); // Allow clicking on indicators
            indicators.appendChild(button);
        });
    }

    // Initialize indicators on DOM content load
    document.addEventListener('DOMContentLoaded', updateIndicators);
</script>

@endsection
