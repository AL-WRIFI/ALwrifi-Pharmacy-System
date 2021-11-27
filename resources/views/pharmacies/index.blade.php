@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto py-3">
        <div class="row">
            <h4 class="w-50">
                <i class="fa fa-mortar-pestle"></i>
                {{ __('Pharmacies') }}
            </h4>
            <a a href="{{ route('pharmacies.create') }}" class="text-end d-inline w-50">
               <i class="fa fa-star"></i>
                {{ __('Add New') }}
            </a>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pharmacies as $pharmacy)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pharmacy->name }}</td>
                        <td>
                            <a href="{{ route('pharmacies.show', $pharmacy->id) }}"
                                class="btn btn-success">
                                <i class="fa fa-eye"></i>
                                {{ __('Show') }}
                            </a>
                            <a href="{{ route('pharmacies.edit', $pharmacy->id) }}"
                                class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            <a data-action="{{ route('pharmacies.destroy', $pharmacy->id) }}"
                                class="btn btn-danger delete-button">
                                <i class="fa fa-trash"></i>
                                {{ __('Delete') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $pharmacies->links() }}
    </div>
</div>
@endsection