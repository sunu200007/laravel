@extends('layouts.mainlayout')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Tambah Kategori Baru</h1>
    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
            
        @endif
        <form action="category-add" method="post">
            @csrf
            <div class="">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection