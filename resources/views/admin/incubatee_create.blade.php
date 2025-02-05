@extends('layouts.admin')

@section('page_title', 'Incubatee Create')

@section('content')
    <div class="container mt-4">

        @if (session('error'))
            <div class="alert alert-danger">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Error</h5>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form method="post" action="{{ route('incubatee.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <label for="incubatee_name">Incubatee Name</label>
                            <input type="text" name="incubatee_name" class="form-control" value="{{ old('incubatee_name') }}">
                            @error('incubatee_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="business_name">Business Name</label>
                            <input type="text" name="business_name" class="form-control" value="{{ old('business_name') }}">
                            @error('business_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="image">Incubatee Image</label>
                            <input type="file" name="image" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <input style="background-color: #333;" type="submit" value="Submit" class="btn btn-primary">
                                <a href="{{ route('incubatee.index') }}" class="btn btn-secondary mt-3">Back</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
@endsection
