@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto py-3">
        <div class="row text-center">
            <h4>
                <i class="fa fa-mortar-pestle"></i>
                {{ __('Add New Pharmacy') }}
            </h4>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('pharmacies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-3">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" class="form-control" type="text" name="name" required>
            </div>
            <div class="form-group mt-3">
                <label for="address">{{ __('Address') }}</label>
                <input id="address" class="form-control" type="text" name="address" required>
            </div>
            <div class="form-group mt-5">
                <label for="logo">{{ __('Logo') }}</label>
                <input id="logo" class="form-control-file" type="file" name="logo" accept="image/*">
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