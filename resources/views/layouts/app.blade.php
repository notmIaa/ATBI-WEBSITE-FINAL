<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    <link rel="icon" href="{{ asset('images/ATBI_LOGO.png') }}" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/admin-custom-styles.css') }}" rel="stylesheet">
    <!-- Feather Icons (or FontAwesome) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> 
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">

    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    {{-- fONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Outfit:wght@100..900&family=Sora:wght@100..800&display=swap" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
 /* Adjust Navbar */
 .navbar {
    position: relative; /* Fixes the navbar to the top */
    /* top: 2rem; Ensures it's at the top of the page */
    left: 0;
    right: 0; /* Makes the navbar stretch from left to right */
    margin: 0 auto; /* Centers the navbar */
    width: 100%;
    background-color: rgba(255, 255, 255, 0.699); /* Slightly transparent background */
    z-index: 1000; /* Ensures the navbar stays on top of other elements */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for floating effect */
    padding: 1rem 2rem; /* Adjust padding for more space */
    text-align: center;
    transition: background-color 0.3s ease; /* Smooth transition for background color */
    /* border-radius: 50px; */
}


/* Navbar Styling */
.navbar {
    position: relative;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.699);
    z-index: 1000;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 1rem 2rem;
    transition: background-color 0.4s ease, box-shadow 0.3s ease;
}

/* Hover Effect */
.navbar:hover {
    background-color: rgba(255, 255, 255, 1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

/* Navbar Links Animation */
.navbar-nav .nav-link {
    position: relative;
    color: white !important;
    font-size: 1.1rem;
    font-weight: 600;
    transition: color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #fffd88 !important; /* Change text color on hover */
    font-size: 1rem;
    transition: all 0.3s ease-in-out;
}

/* Animated Underline */
.navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -3px;
    width: 0;
    height: 2px;
    background-color: #fffd88;
    transition: all 0.3s ease-in-out;
    transform: translateX(-50%);
}

.navbar-nav .nav-link:hover::after {
    width: 100%;
}

/* Navbar Background Change on Scroll */
.navbar.scrolled {
    background-color: rgba(255, 255, 255, 1) !important;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.navbar a,
/* .navbar span, */
.navbar h1,
.navbar h2,
.navbar h3,
.navbar h4,
.navbar h5,
.navbar h6,
.navbar p {
    color: white !important; /* Ensure the text color remains white */
    font-size: 1.5rem; /* Adjust text size for better readability */
    font-weight: 600; /* Make text bold */
    font-family: "Outfit", serif;
}

.navbar span{
    font-size: 1.8rem;
    font-family: "Outfit", serif;
    font-weight: 900;
}

.bg-white {
    --bs-bg-opacity: 1;
    background-color: rgb(11 155 61 / 84%) !important;
}
footer {
    background: #25883c;
    text-align: center; /* Corrected from "text-alignment" */
    color: white;
    padding: 20px 0;
    font-size: 1rem;
}

.footer-content {
    max-width: 1200px;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    text-align: center;
}

.footer-content p {
    margin: 0;
}

.footer-links {
    list-style: none;
    padding: 0;
    display: flex;
    align-items: center;

    
}


</style>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Navbar Brand (Logo + Name) -->
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/benguet-state-university-logo.png') }}" alt="BSU Logo" style="height: 50px;">
                    <img src="{{ asset('images/ATBI_LOGO.png') }}" alt="ATBI Logo" style="height: 50px; margin-left: 10px;">
                    <span>BSU-ATBI / IC</span>
                </a>

                <!-- Toggler for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Navbar Items -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/incubatee/list') }}">Incubatees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/productlist') }}">Products</a>
                        </li>
                    </ul>

                    <!-- Right Side Navbar Items -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Search Bar -->
                        {{-- <li class="nav-item">
                            <div class="search">
                                <input type="text" placeholder="Search" />
                                <div class="symbol">
                                    <i class="fas fa-search"></i> <!-- FontAwesome Search Icon -->
                                </div>
                            </div>
                        </li> --}}

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- User Dropdown -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
{{-- <footer>
    <p>&copy; {{ date('Y') }} BSU-Agribased Technology Business Incubator. All Rights Reserved.</p>
    <div class="footer-links">
        <a href="#learn-more">Learn More</a> | 
        <a href="{{ url('/about') }}">About Us</a> |
        <a href="{{ url('/contact') }}">Contact</a>
    </div> --}}
</footer>
</body>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var navbar = document.querySelector(".navbar");
        
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    });
</script>

</html>
