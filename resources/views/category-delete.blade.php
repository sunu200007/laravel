@extends('layouts.mainlayout')

@section('title', 'Hapus Kategori')

@section('content')
    <h2>Apakah kamu akan menghapus Kategori {{$category->name}} ?</h2>
    <div class="mt-5">
        <a href="/category-destroy/{{$category->slug}}" class="btn btn-danger me-5">Iya</a>
        <a href="/categories" class="btn btn-info">Tidak</a>
    </div>
@endsection