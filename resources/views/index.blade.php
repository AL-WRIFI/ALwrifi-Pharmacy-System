@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto py-3">
            <div class="row">
                <h4 class="w-50">{{ __('Latest Products') }}</h4>
                <a href="{{ route('products.index') }}" class="text-end d-inline w-50">
                    <i class="fa fa-plus-circle"></i>
                    {{ __('Show More') }}
                </a>
            </div>
            <div class="row py-2">
                @foreach ($latestProducts as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card text-center">
                            <img src="{{ $product->image_src }}" class="card-img-top" alt="{{ __('Product Image') }}">
                            <div class="card-body">
                                <p class="card-title">{{ substr($product->title, 0, 30) }}</p>
                                <a href="{{ route('products.show', $product->id) }}" 
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                    {{ __('Show Details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-8 mx-auto py-3">
            <div class="row">
                <h4 class="w-50">{{ __('Latest Pharmacies') }}</h4>
                <a href="{{ route('pharmacies.index') }}" class="text-end d-inline w-50">
                    <i class="fa fa-plus-circle"></i>
                    {{ __('Show More') }}
                </a>
            </div>
            <div class="row py-2">
                @foreach ($latestPharmacies as $pharmacy)
                    <div class="col-md-3 mb-4">
                        <div class="card text-center">
                            <img src="{{ $pharmacy->logo_src }}" class="card-img-top" alt="{{ __('Pharmacy Logo') }}">
                            <div class="card-body">
                                <p class="card-title">{{ substr($pharmacy->name, 0, 30) }}</p>
                                <a href="{{ route('pharmacies.show', $pharmacy->id) }}" 
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                    {{ __('Show Details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection