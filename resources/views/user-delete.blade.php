@extends('layouts.mainlayout')

@section('title', 'Hapus User')

@section('content')
    <h2>Apakah kamu akan menghapus User {{$user->username}} ?</h2>
    <div class="mt-5">
        <a href="/user-destroy/{{$user->slug}}" class="btn btn-danger me-5">Iya</a>
        <a href="/users" class="btn btn-info">Tidak</a>
    </div>
@endsection