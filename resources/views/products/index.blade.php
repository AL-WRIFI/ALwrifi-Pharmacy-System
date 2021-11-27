@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto py-3">
        <div class="row">
            <h4 class="w-50">
                <i class="fa fa-pills"></i>
                {{ __('Products') }}
            </h4>
            <a a href="{{ route('products.create') }}" class="text-end d-inline w-50">
               <i class="fa fa-star"></i>
                {{ __('Add New') }}
            </a>
        </div>

        @if (count($products))
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->title }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                    {{ __('Show') }}
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                    {{ __('Edit') }}
                                </a>
                                <a data-action="{{ route('products.destroy', $product->id) }}"
                                    class="btn btn-danger delete-button">
                                    <i class="fa fa-trash"></i>
                                    {{ __('Delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        @else
            <h4 class="text-center text-danger my-5">
                <i class="fa fa-exclamation-triangle"></i>
                {{ __('Sorry, no results were found') }}
            </h4>
        @endif
    </div>
</div>
@endsection