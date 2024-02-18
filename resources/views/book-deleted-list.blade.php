@extends('layouts.mainlayout')

@section('title', 'Kategori Dihapus')

@section('content')
    <h1>List Kategori Terhapus</h1>
    <div class="mt-5 d-flex justify-content-end">
        <a href="/categories" class="btn btn-secondary me-3">Kembali</a>
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
                    <th>Kode</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedBooks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="/book-restore/{{$item->slug}}">restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection