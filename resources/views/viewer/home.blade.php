@extends('layouts.app')
@section('page_title', 'BSU-Agribased Technology Business Incubator')
@section('content')

<!-- AOS (Animate On Scroll) Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<style>
    /* General Styles */
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow-x: hidden;
        font-family: "DM Sans", sans-serif;
    }

    /* Hero Section */
    .hero {
        height: 50vh;
        width: 100vw;
        background: url("{{ asset('carousels/main.png') }}") center/cover no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        padding: 50px;
        font-family: "Outfit", serif;
        
    }

    .hero-content h1 {
        font-size: 3.5rem;
        font-weight: bold;

    }
    .hero-content p {
        font-size: 1rem;
        font-weight: 500;

    }

    .btn-hero {
        padding: 12px 25px;
        background-color: #22a6b3;
        color: white;
        font-size: 1rem;
        border-radius: 10px;
        transition: all 0.3s ease;
        display: inline-block;
        text-decoration: none;
    }

    .btn-hero:hover {
        background-color: #1d868a;
        transform: scale(1.05);
    }

    /* Steps Section */
    .steps-container {
        padding: 80px 10%;
        text-align: center;
        background-color: #f8f9fa;
    }

    .step {
        display: flex;
        align-items: center;
        margin-bottom: 50px;
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .step.active {
        opacity: 1;
        transform: translateY(0);
    }

    .step:nth-child(even) {
        flex-direction: row-reverse;
    }

    .step img {
        width: 50%;
        max-width: 400px;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .step-text {
        width: 50%;
        padding: 20px;
    }

    .step-text h2 {
        font-size: 2rem;
        color: #118934;
    }

    h1{
        font-family: "Outfit", serif !important;
        font-weight: 900;
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h3>Welcome!</h3>
        <h1>BSU-Agribased Technology Business Incubator</h1>
        <p>Where the seeds of smallholder agribusiness are sown, grown and bear their first fruits..</p>
        <a href="#how-to-join" class="btn-hero">How to Become an Incubatee</a>
    </div>
</section>

<!-- Steps to Join -->
<section id="how-to-join" class="steps-container">
    <h1 style="font-weight: 700; color: #31aa5c;">How to Become an Incubatee</h1>       
    <p>Follow these simple steps to start your journey as an incubatee:</p>

    <div class="step" data-aos="fade-up">
        <img src="{{ asset('images/Application.png') }}" alt="Submit an Application">
        <div class="step-text">
            <h2>Step 1: Submit an Application</h2>
            <p>Fill out the application form with your business idea and details.</p>
        </div>
    </div>

    <div class="step" data-aos="fade-up">
        <img src="{{ asset('images/Orientation.png') }}" alt="Attend an Orientation">
        <div class="step-text">
            <h2>Step 2: Attend an Orientation</h2>
            <p>Learn more about the program and how we can help you succeed.</p>
        </div>
    </div>

    <div class="step" data-aos="fade-up">
        <img src="{{ asset('images/Evaluation.png') }}" alt="Pass the Evaluation">
        <div class="step-text">
            <h2>Step 3: Pass the Evaluation</h2>
            <p>Our team will assess your business idea and provide feedback.</p>
        </div>
    </div>

    <div class="step" data-aos="fade-up">
        <img src="{{ asset('images/Start.png') }}" alt="Start Your Incubation Journey">
        <div class="step-text">
            <h2>Step 4: Start Your Incubation Journey</h2>
            <p>Once accepted, you'll receive mentorship, funding, and resources.</p>
        </div>
    </div>
</section>

<script>
    AOS.init(); // Initialize AOS library

    document.addEventListener("DOMContentLoaded", function () {
        const steps = document.querySelectorAll(".step");
        steps.forEach((step, index) => {
            setTimeout(() => {
                step.classList.add("active");
            }, index * 400);
        });
    });
</script>

@endsection
