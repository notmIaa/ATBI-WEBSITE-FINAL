@extends('layouts.admin')

@section('page_title', 'Incubatee Edit')

@section('content')
    <div class="container">

        @if(session('error'))
            <div class="alert alert-danger">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        <form method="POST" action="{{ route('incubatee.update', $incubatee['id']) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <label for="image">Incubatee Image</label>
                            @if($incubatee->image)
                                <img src="{{ asset('storage/' . $incubatee->image) }}" alt="{{ $incubatee->incubatee_name }}" width="100" height="100">
                                <br><br>
                                <span>Change Image (optional)</span>
                            @else
                                <span>No Image</span>
                                <br><br>
                            @endif
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="incubatee_name">Incubatee Name</label>
                            <input type="text" name="incubatee_name" class="form-control" value="{{ $incubatee['incubatee_name'] }}">
                            @error('incubatee_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="business_name">Business Name</label>
                            <input type="text" name="business_name" class="form-control" value="{{ $incubatee['business_name'] }}">
                            @error('business_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <input style="background-color: #333;" type="submit" value="Save Edit" class="btn btn-primary">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
@endsection
