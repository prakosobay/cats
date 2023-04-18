@extends('layouts.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800 text-center">Table of Cats</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Data
        </button>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" id="name" name="name" value="{{ old('name')}}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="form-label">Gender :</label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option selected></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type" class="form-label">Type :</label>
                        <select name="type" id="type" class="form-select" required>
                            <option selected></option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
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
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="judul-table text-center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Color</th>
                        <th>Food</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="isi-table text-center">
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
