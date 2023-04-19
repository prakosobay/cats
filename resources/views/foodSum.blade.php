@extends('layouts.master')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800 text-center">Table Food</h1>
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
