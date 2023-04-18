@extends('layouts.master')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800 text-center">Table of Cats</h1>
        <a type="button" href="{{ route('tambah.cat')}}" class="btn btn-primary">
            Add Data
        </a>
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
                    @foreach ( $cats as $cat )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->gender }}</td>
                            <td>{{ $cat->typeId->name }}</td>
                            <td>{{ $cat->color }}</td>
                            <td>{{ $cat->food }}</td>
                            <td>
                                <a href="{{ route('edit.cat', $cat->id)}}" class="btn btn-sm btn-success mx-1 my-1" ><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                <form action="{{ route('delete.cat',$cat->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete This Data ?')" >
                                    @csrf
                                    <button type="submit"class="btn btn-danger btn-sm mx-1 my-1">Hapus</button>
                                </form>
                            </td>
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
