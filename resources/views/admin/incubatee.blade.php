@extends('layouts.admin')
@section('page_title', 'Incubatee')
@section('content')
    <div class="row mt-4">
        @foreach ($incubatees as $incubatee)
            <div class="col-md-3 mb-4">
                <a href="{{ route('admin.incubatee_show', $incubatee->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card" style="border: 1px solid #ddd; border-radius: 8px;">
                        <img src="{{ $incubatee->image ? asset('storage/' . $incubatee->image) : asset('storage/default_image.png') }}" 
                             class="card-img-top" alt="{{ $incubatee->incubatee_name }}" style="height: 200px; object-fit: cover; border-radius: 8px 8px 0 0;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $incubatee->incubatee_name }}</h5>
                            <p class="card-text">{{ $incubatee->business_name }}</p>
                        </div>
                    </div>
                </a>
                <div class="d-flex justify-content-center">
                            <a class="btn btn-warning btn-sm mr-2" href="{{ route('incubatee.edit', $incubatee->id) }}">Edit</a>
                            <form method="post" action="{{ route('incubatee.destroy', $incubatee->id) }}" style="display: inline;">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
            </div>
        @endforeach
    </div>
@endsection
