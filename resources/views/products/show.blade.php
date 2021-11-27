@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto py-3">
        <table class="table table-bordered">
            <tr>
                <td rowspan="2" class="text-center">
                    <img src="{{ $product->image_src }}" alt="{{ __('Product Logo') }}">
                </td>
                <td colspan="2">
                    <h4>{{ $product->title }}</h4>
                </td>
            </tr>
            <tr>
                <td>{{ $product->desc }}</td>
            </tr>
        </table>

        <div class="row mt-5 mb-3">
            <h4 class="text-center">
                <i class="fa fa-mortar-pestle"></i>
                {{ __('Pharmacies') }}
            </h4>
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
                @foreach ($product->pharmacies as $pharmacy)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pharmacy->name }}</td>
                        <td>{{ $pharmacy->pivot->price }}</td>
                        <td>{{ $pharmacy->pivot->quantity }}</td>
                        <td>
                            <a href="{{ route('pharmacies.show', $pharmacy->id) }}"
                                class="btn btn-success">
                                <i class="fa fa-eye"></i>
                                {{ __('Show') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection