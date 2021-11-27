@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto py-3">
        <table class="table table-bordered">
            <tr>
                <td rowspan="2" class="text-center">
                    <img src="{{ $pharmacy->logo_src }}" alt="{{ __('Pharmacy Logo') }}">
                </td>
                <td colspan="2">
                    <h4>{{ $pharmacy->name }}</h4>
                </td>
            </tr>
            <tr>
                <td>{{ $pharmacy->address }}</td>
            </tr>
        </table>

        <div class="row mt-5 mb-3">
            <h4 class="w-50">
                <i class="fa fa-pills"></i>
                {{ __('Products') }}
            </h4>
            <a a href="{{ url('/pharmacies/add/product/view/'.$pharmacy->id) }}" class="text-end d-inline w-50">
               <i class="fa fa-plus-circle"></i>
                {{ __('Add Product') }}
            </a>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pharmacy->products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}"
                                class="btn btn-success">
                                <i class="fa fa-eye"></i>
                                {{ __('Show') }}
                            </a>
                            <a data-pharmacy="{{ $pharmacy->id }}" data-product="{{ $product->id }}"
                                class="btn btn-danger remove-button">
                                <i class="fa fa-times-circle"></i>
                                {{ __('Remove') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection