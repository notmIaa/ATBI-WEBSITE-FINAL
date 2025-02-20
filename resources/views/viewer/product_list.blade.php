@extends('layouts.app')
@section('page_title', 'BSU-Agribased Technology Business Incubator')
@section('content')

<style>
    /* Category Tabs Styling to look like folder tabs */
    .category-tabs {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
        padding: 0;
        border-bottom: 2px solid #ddd; /* Border separating tabs from content */
    }

    .category-tabs button {
        background-color: #f4f4f4;
        color: #236903;
        border: 2px solid #ddd;
        padding: 10px 20px;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 10px 10px 0 0; /* Rounded top corners */
        transition: all 0.3s ease;
        margin-right: 10px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
    }

    /* Style for the active tab (when clicked) */
    .category-tabs button.active {
        background-color: #236903;
        color: white;
        border-color: #236903;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .category-tabs button:hover {
        background-color: #f0f0f0;
        transform: translateY(-2px);
    }

    /* Category Tabs Container Styling */
    .category-tabs button:last-child {
        margin-right: 0;
    }

    /* Search Bar and Sort */
    .search-sort-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .search-sort-container input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        width: 60%;
    }

    .search-sort-container select {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    /* Product List Styling */
    .product-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 20px;
    }
</style>

<div class="container">
    <!-- Search Bar and Sort Options -->
    <div class="search-sort-container">
        <input type="text" id="searchBar" placeholder="Search products..." onkeyup="filterProducts()">
        <select id="sortOrder" onchange="sortProducts()">
            <option value="name">Sort by Name</option>
            <option value="price">Sort by Price</option>
            <option value="rating">Sort by Rating</option>
        </select>
    </div>

    <!-- Category Tabs -->
    <div class="category-tabs">
        <button class="category-tab" onclick="filterByCategory('all')" id="tab-all">All Products</button>
        <button class="category-tab" onclick="filterByCategory('category1')" id="tab-category1">Category 1</button>
        <button class="category-tab" onclick="filterByCategory('category2')" id="tab-category2">Category 2</button>
        <button class="category-tab" onclick="filterByCategory('category3')" id="tab-category3">Category 3</button>
    </div>

    <!-- Product List -->
    <div class="row mt-4" id="productList">
        @foreach ($incubateeproducts as $incubateeproduct)
            <div class="col-md-3 mb-4 product-item" data-category="{{ $incubateeproduct->category }}">
                <a href="{{ route('viewer.product_show', $incubateeproduct->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                        <img src="{{ $incubateeproduct->product_image ? asset('storage/' . $incubateeproduct->product_image) : asset('storage/default_image.png') }}"
                             class="card-img-top" alt="{{ $incubateeproduct->product_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $incubateeproduct->product_name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<script>
    // Add active class to the selected category tab
    function setActiveTab(selectedCategory) {
        let tabs = document.querySelectorAll('.category-tab');
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });

        document.getElementById('tab-' + selectedCategory).classList.add('active');
    }

    // Filter products by category
    function filterByCategory(category) {
        setActiveTab(category);  // Set active class on selected category tab
        
        let productItems = document.getElementsByClassName('product-item');
        
        for (let i = 0; i < productItems.length; i++) {
            if (category === 'all' || productItems[i].getAttribute('data-category') === category) {
                productItems[i].style.display = '';
            } else {
                productItems[i].style.display = 'none';
            }
        }
    }

    // Filter products by search bar
    function filterProducts() {
        let searchQuery = document.getElementById('searchBar').value.toLowerCase();
        let productItems = document.getElementsByClassName('product-item');
        
        for (let i = 0; i < productItems.length; i++) {
            let productName = productItems[i].querySelector('.card-title').innerText.toLowerCase();
            if (productName.includes(searchQuery)) {
                productItems[i].style.display = '';
            } else {
                productItems[i].style.display = 'none';
            }
        }
    }

    // Sort products by selected option
    function sortProducts() {
        let sortOrder = document.getElementById('sortOrder').value;
        let productItems = Array.from(document.getElementsByClassName('product-item'));
        
        productItems.sort(function(a, b) {
            let valueA, valueB;

            if (sortOrder === 'name') {
                valueA = a.querySelector('.card-title').innerText.toLowerCase();
                valueB = b.querySelector('.card-title').innerText.toLowerCase();
            } else if (sortOrder === 'price') {
                valueA = parseFloat(a.querySelector('.product-price').innerText.replace('$', ''));
                valueB = parseFloat(b.querySelector('.product-price').innerText.replace('$', ''));
            } else if (sortOrder === 'rating') {
                valueA = parseFloat(a.querySelector('.product-rating').innerText);
                valueB = parseFloat(b.querySelector('.product-rating').innerText);
            }

            return valueA > valueB ? 1 : valueA < valueB ? -1 : 0;
        });

        let productList = document.getElementById('productList');
        productItems.forEach(function(item) {
            productList.appendChild(item);
        });
    }
</script>

@endsection
