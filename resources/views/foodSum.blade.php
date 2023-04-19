@extends('layouts.master')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800 text-center">Table Amount of Food</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add New Amount
        </button>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('sumFood.cat')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type_id" class="form-label">Type of Cat :</label>
                            <select name="type_id" id="type_id" class="form-select" required>
                                <option selected></option>
                                @foreach ( $types as $type )
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="food_id" class="form-label">Food :</label>
                            <select name="food_id" id="food_id" class="form-select" required>
                                <option selected></option>
                                @foreach ( $foods as $food )
                                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount" class="form-label">Amount (Kg) :</label>
                            <input type="numeric" class="form-control" id="amount" value="{{ old('amount')}}" required name="amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
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
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="80%" cellspacing="0">
                <thead>
                    <tr class="judul-table text-center">
                        <th>No.</th>
                        <th>Type</th>
                        <th>Food</th>
                        <th>Amount (Kg)</th>
                    </tr>
                </thead>
                <tbody class="isi-table text-center">
                    @foreach ( $amountFoods as $sum )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sum->type_name }}</td>
                            <td>{{ $sum->food_name }}</td>
                            <td>{{ $sum->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')

    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        });
    </script>
@endpush

@endsection
