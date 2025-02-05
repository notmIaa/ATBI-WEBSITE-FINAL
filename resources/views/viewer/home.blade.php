@extends('layouts.app')
@section('page_title', 'BSU-Agribased Technology Business Incubator')
@section('content')

<!-- AOS (Animate On Scroll) Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<style>
    /* Reset default margin/padding */
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow-x: hidden;
        font-family: "DM Sans", sans-serif;
    }

    /* Hero Section */
    .hero {
        height: 100vh;
        width: 100vw;
        background: url("{{ asset('carousels/main.png') }}") center/cover no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        padding: 50px;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        font-weight: bold;
        padding-left: 50px;
        padding-right: 50px;
    }

    .btn-hero {
        padding: 12px 25px;
        background-color: #22a6b3;
        color: white;
        font-size: 1rem;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-hero:hover {
        background-color: #1d868a;
        transform: scale(1.05);
    }

    /* Statistics Section */
    .stats-section {
        padding: 80px 10%;
    }

    .stats-text {
        font-size: 2rem;
        font-weight: bold;
        color: #1d868a;
    }

    /* Philippine Map */
    .map {
        width: 100%;
        max-width: 500px;
        display: block;
        margin: auto;
    }

    /* Cards */
    .card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card h2 {
        font-weight: 900;
        color: #118934;
    }

    .title-stat {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: rgb(0, 0, 0);
    text-align: center;
    padding: 50px;
}

.title-stat h1 {
    font-family: "DM Sans", sans-serif;
    font-weight: 900;
    font-size: 3rem; /* Increase size */
    color: #118934; /* Highlight color */
    text-transform: uppercase; /* Emphasize text */
    letter-spacing: 1.5px;
    margin-bottom: 10px; /* Small spacing below */
}

.title-stat p {
    font-size: 1.2rem;
    font-weight: 400;
    margin-bottom: 0; /* Remove bottom margin */
    color: #555; /* Slightly softer text color */
}

#stats-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align content to the top */
    justify-content: flex-start; /* Ensure it stays at the top */
    text-align: left; /* Align text to the left */
    padding-top: 20px; /* Adjust spacing if necessary */
}


</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h3>Welcome!</h3>
        <h1>BSU-Agribased Technology Business Incubator</h1>
        <p>Where the seeds of smallholder agribusiness are sown, grown, and bear their first fruits.</p>
        <a href="#learn-more" class="btn-hero">Learn More</a>
    </div>
</section>


<section id="learn-more" >

    <div class="title-stat">
    <p>Nurturing Success</p>
    <h1>Our Journey with Our Incubatees</h1>
    <p>We have guided and empowered over 100 incubatees across the Philippines.</p>
    </div>

<!-- Statistics Section -->
<div class="container-fluid stats-section">
    <div class="row align-items-center">
        <!-- Left Side: Philippine Map -->
        <div class="col-md-6 text-center">
            <img src="{{ asset('carousels/pilipins.png') }}" alt="Philippines Map" class="map img-fluid">
        </div>

        <!-- Right Side: Stats Statement -->
        <div class="col-md-6 text-left" id="stats-content">
            <h1 class="stats-text">Over 100 Incubatees Across the Philippines!</h1>
            <p>Through our program, we've nurtured aspiring entrepreneurs, fostering innovation and sustainability in agribusiness.</p>

            <!-- 2x2 Grid Cards -->
            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <h2>00</h2>
                        <p>Incubatees in Luzon</p>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <h2>00</h2>
                        <p>Incubatees in Visayas</p>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <h2>00</h2>
                        <p>Incubatees in Mindanao</p>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card p-3">
                        <h2>00</h2>
                        <p>Incubatees Nationwide</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

<script>
    AOS.init(); // Initialize AOS library

    // Ensure Right Side Appears (Debugging)
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            document.getElementById('stats-content').style.opacity = "1";
            document.getElementById('stats-content').style.transform = "translateY(0)";
        }, 500);
    });
</script>

@endsection
