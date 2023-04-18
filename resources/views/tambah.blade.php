@extends('layouts.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800 text-center">Add New Cat</h1>
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
        <form action="{{ route('store.cat')}}" method="POST" class="validate-form">
            @csrf
            <div class="card-body" id="input-container">
                <div class="row">
                    <div class="form-group">
                        <label for="name" class="form-label"><b>Name :</b></label>
                        <input type="name" name="name" value="{{ old('name')}}" class="form-control" id="name" required autofocus>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender" class="form-label"><b>Gender :</b></label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option selected></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type" class="form-label"><b>Type :</b></label>
                            <select name="type_id" id="type" class="form-select" required>
                                <option selected></option>
                                @foreach ( $types as $type )
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color" class="form-label"><b>Color :</b></label>
                            <input type="text" name="color" value="{{ old('color')}}" class="form-control" id="color" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="food" class="form-label"><b>Food :</b></label>
                            <input type="text" name="food" value="{{ old('food')}}" class="form-control" id="food" required>
                        </div>
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
