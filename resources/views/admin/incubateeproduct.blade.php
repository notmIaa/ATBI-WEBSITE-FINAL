@extends('layouts.admin')

@section('page_title', 'Incubatee and Product')

@section('content')
    <div class="card-body">
        <div class="d-flex flex-wrap">
            @forelse ($incubatee_products as $incubatee_product)
                <div class="card" style="width: 400px; margin: 10px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    @if ($incubatee_product->incubatee->image)
                                        <img src="{{ asset('storage/' . $incubatee_product->incubatee->image) }}" 
                                             alt="Incubatee Image" 
                                             style="width: 100px; height: 100px; border-radius: 50%;">
                                    @else
                                        <div style="width: 100px; height: 100px; background-color: #f0f0f0; border-radius: 50%; display: inline-block; line-height: 100px;">
                                            No Image
                                        </div>
                                    @endif
                                    <h5 style="margin-top: 10px;">{{ $incubatee_product->incubatee->incubatee_name ?? 'N/A' }}</h5>
                                    <p style="font-size: 14px; color: #555;">{{ $incubatee_product->incubatee->business_name ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="text-center">
                                    @if ($incubatee_product->product_image)
                                        <img src="{{ asset('storage/' . $incubatee_product->product_image) }}" 
                                             alt="Product Image" 
                                             style="width: 150px; height: 100px; border-radius: 8px;">
                                    @else
                                        <div style="width: 150px; height: 100px; background-color: #f0f0f0; border-radius: 8px; display: inline-block; line-height: 100px;">
                                            No Image
                                        </div>
                                    @endif
                                    <h5>{{ $incubatee_product->product_name ?? 'N/A' }}</h5>
                                    <p style="font-size: 14px; color: #555;">{{ $incubatee_product->description ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="text-center">
                                    <a class="btn btn-primary btn-sm" 
                                       style="background-color: #00CFFF; border-color: #00CFFF; margin: 5px;" 
                                       href="{{ route('incubateeproduct.edit', $incubatee_product->id) }}">
                                        Edit
                                    </a>
                                    <form method="post" 
                                          action="{{ route('incubateeproduct.destroy', $incubatee_product->id) }}" 
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-sm" 
                                                style="background-color: #FF6B6B; border-color: #FF6B6B; margin: 5px;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">No records found.</div>
            @endforelse
        </div>
    </div>

@endsection