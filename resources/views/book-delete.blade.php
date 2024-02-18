@extends('layouts.mainlayout')

@section('title', 'Hapus Buku')

@section('content')
    <h2>Apakah kamu akan menghapus Buku {{$book->name}} ?</h2>
    <div class="mt-5">
        <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger me-5">Iya</a>
        <a href="/books" class="btn btn-info">Tidak</a>
    </div>
@endsection