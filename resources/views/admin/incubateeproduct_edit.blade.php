@extends('layouts.admin')

@section('page_title', 'Edit Incubatee Product')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">Edit Product for Incubatee</h2>

            <form action="{{ route('incubateeproduct.update', $incubateeProduct->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="incubatee_name" class="font-weight-bold">Select Incubatee:</label>
                    <input type="text" id="incubatee_name" name="incubatee_name" class="form-control" value="{{ old('incubatee_name', $incubateeProduct->incubatee->name) }}" placeholder="Search Incubatee..." autocomplete="off" required>
                    <div id="incubatee_suggestions" class="list-group mt-2" style="display: none;"></div>
                    <input type="hidden" id="incubatee_id" name="incubatee_id" value="{{ old('incubatee_id', $incubateeProduct->incubatee_id) }}">
                </div>

                <div class="form-group">
                    <label for="incubatee_image" class="font-weight-bold">Incubatee Image:</label>
                    <div class="border rounded p-2 text-center bg-light">
                        @if ($incubateeProduct->incubatee->image)
                            <img src="{{ asset('storage/' . $incubateeProduct->incubatee->image) }}" alt="Incubatee Image" class="img-fluid rounded shadow" width="150">
                        @else
                            <p class="text-muted">No image available</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_name" class="font-weight-bold">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name', $incubateeProduct->product_name) }}" required>
                    @error('product_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $incubateeProduct->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="product_image" class="font-weight-bold">Product Image:</label>
                    <input type="file" id="product_image" name="product_image" class="form-control">
                    @if ($incubateeProduct->product_image)
                        <p class="mt-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $incubateeProduct->product_image) }}" alt="Product Image" class="img-fluid rounded" style="max-width: 150px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                <a href="{{ route('incubateeproduct.index') }}" class="btn btn-secondary mt-3">Back</a>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const incubateeNameInput = document.getElementById('incubatee_name');
        const incubateeSuggestions = document.getElementById('incubatee_suggestions');
        const incubateeIdInput = document.getElementById('incubatee_id');

        incubateeNameInput.addEventListener('input', function () {
            const query = incubateeNameInput.value;
            if (query.length > 2) {
                fetch(`/admin/incubatees/search?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        incubateeSuggestions.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(incubatee => {
                                const suggestionItem = document.createElement('div');
                                suggestionItem.classList.add('list-group-item', 'list-group-item-action');
                                suggestionItem.innerHTML = incubatee.name;
                                suggestionItem.addEventListener('click', function () {
                                    incubateeNameInput.value = incubatee.name;
                                    incubateeIdInput.value = incubatee.id;
                                    incubateeSuggestions.style.display = 'none';
                                });
                                incubateeSuggestions.appendChild(suggestionItem);
                            });
                            incubateeSuggestions.style.display = 'block';
                        } else {
                            incubateeSuggestions.style.display = 'none';
                        }
                    });
            } else {
                incubateeSuggestions.style.display = 'none';
            }
        });
        incubateeNameInput.addEventListener('blur', function () {
            setTimeout(() => {
                incubateeSuggestions.style.display = 'none';
            }, 100);
        });

    </script>
@endsection

<style>
    .container {
        max-width: 700px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        font-size: 1.5rem;
    }

    .form-group label {
        font-size: 1rem;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
    }

    .btn {
        border-radius: 8px;
        padding: 10px 20px;
    }

    .alert {
        margin-top: 20px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .img-fluid.rounded {
        border-radius: 10px;
    }

    .list-group-item {
        cursor: pointer;
    }

    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
