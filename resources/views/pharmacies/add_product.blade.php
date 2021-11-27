@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto py-3">
        <div class="row text-center">
            <h4>
                <i class="fa fa-pills"></i>
                {{ __('Add Product To Pharmacy') }}
            </h4>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('pharmacies/add/product') }}" method="POST">
            @csrf
            <input type="hidden" name="pharmacy_id" value="{{ $id }}">

            <div class="form-group mt-3">
                <label for="name">{{ __('Title') }}</label>
                <div class="search-results product-search-results">
                    <input class="form-control" id="product-search-keyword" name="keyword" type="search" autocomplete="off">
                        
                    <ul>
                        <!-- [Search Results] -->
                    </ul>
                </div>
                <input type="hidden" name="product_id">
            </div>
            <div class="form-group mt-3">
                <label for="price">{{ __('Price') }}</label>
                <input id="price" class="form-control" type="number" min="0" value="0" name="price" required>
            </div>
            <div class="form-group mt-3">
                <label for="quantity">{{ __('Qunatity') }}</label>
                <input id="quantity" class="form-control" type="number" min="0" value="0" name="quantity" required>
            </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-success w-100">
                    <i class="fa fa-check"></i>
                    {{ __('Submit') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection