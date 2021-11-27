@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto py-3">
        <div class="row text-center">
            <h4>
                <i class="fa fa-pills"></i>
                {{ __('Add New Product') }}
            </h4>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-3">
                <label for="title">{{ __('Title') }}</label>
                <input id="title" class="form-control" type="text" name="title" required>
            </div>
            <div class="form-group mt-3">
                <label for="desc">{{ __('Description') }}</label>
                <textarea name="desc" id="desc" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group mt-5">
                <label for="image">{{ __('Image') }}</label>
                <input id="image" class="form-control-file" type="file" name="image" accept="image/*">
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