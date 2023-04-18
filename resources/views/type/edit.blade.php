@extends('layouts.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800 text-center">Edit Type</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-2 my-2 text-center">
            <b>{{ session('success') }}</b>
        </div>
    @endif

    @if (session('failed'))
        <div class="alert alert-danger mx-2 my-2 text-center">
            <b>{{ session('failed') }}</b>
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('update.type', $type->id )}}" method="POST" class="validate-form">
            @csrf
            <div class="card-body" id="input-container">
                <div class="row">
                    <div class="form-group">
                        <label for="name" class="form-label"><b>Name :</b></label>
                        <input type="name" name="name" value="{{ $type->name }}" class="form-control" id="name" required autofocus>
                    </div>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" id="add-input-btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
