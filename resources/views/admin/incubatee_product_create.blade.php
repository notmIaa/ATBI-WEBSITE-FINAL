@extends('layouts.admin')

@section('page_title', 'Incubatee And Product Create')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4">Add Product for Incubatee</h2>

            <form action="{{ route('incubateeproduct.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="incubatee_name" class="font-weight-bold">Incubatee Name:</label>
                    <input type="text" id="incubatee_name" name="incubatee_name" class="form-control" required>
                    <input type="hidden" id="incubatee_id" name="incubatee_id"> 
                    @error('incubatee_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="font-weight-bold">Incubatee Image:</label>
                    <input type="text" id="image" name="image" class="form-control" readonly>
                    <div id="image_preview" class="border rounded p-2 text-center bg-light" style="max-width: 200px;">
                        <p class="text-muted">No preview available</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="business_name" class="font-weight-bold">Business Name:</label>
                    <input type="text" id="business_name" name="business_name" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="product_name" class="font-weight-bold">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
                    @error('product_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="product_image" class="font-weight-bold">Product Image:</label>
                    <input type="file" id="product_image" name="product_image" class="form-control">
                    @error('product_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add Product</button>
                <a href="{{ route('incubateeproduct.index') }}" class="btn btn-secondary mt-3">Back</a>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#incubatee_name').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "{{ route('incubatees.search') }}",
                        type: "GET",
                        data: { term: request.term },
                        success: function (data) {
                            response(data);
                        },
                        error: function () {
                            alert("Failed to fetch suggestions.");
                        }
                    });
                },
                select: function (event, ui) {
                    $('#incubatee_name').val(ui.item.label);
                    $('#incubatee_id').val(ui.item.id);

                    $.ajax({
                        url: "{{ route('incubatee.details') }}",
                        type: "GET",
                        data: { incubatee_name: ui.item.label },
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#image').val(response.data.image);
                                $('#business_name').val(response.data.business_name);

                                if (response.data.image) {
                                    $('#image_preview').html('<img src="' + window.location.origin + '/storage/' + response.data.image + '" alt="Incubatee Image" class="img-fluid rounded shadow" width="150">');
                                } else {
                                    $('#image_preview').html('<p class="text-muted">No image available</p>');
                                }
                            }
                        },
                        error: function () {
                            alert("Failed to fetch details.");
                        }
                    });
                }
            });
        });
    </script>

    <style>
        .container {
            max-width: 700px;
        }

        .card {
            border-radius: 10px;
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
    </style>
@endsection
