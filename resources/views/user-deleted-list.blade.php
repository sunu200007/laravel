@extends('layouts.mainlayout')

@section('title', 'Kategori Dihapus')

@section('content')
    <h1>List User Diban</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="users" class="btn btn-secondary me-3">Kembali</a>
    </div>
    <div class="">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedUsers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <a href="user-restore/{{$item->slug}}">unban</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection