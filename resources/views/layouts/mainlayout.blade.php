<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Menambahkan gaya tambahan */
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
        }

        .navbar {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Garis bawah pada navbar */
        }

        .navbar-brand {
            font-weight: bold; /* Teks tebal pada brand navbar */
            color: #343a40; /* Warna teks brand navbar */
        }

        .navbar-toggler-icon {
            background-color: #343a40; /* Warna ikon toggler navbar */
        }

        .sidebar {
            background-color: #343a40; /* Warna latar belakang sidebar */
        }

        .sidebar a {
            color: #ffffff; /* Warna teks link pada sidebar */
        }

        .sidebar a.active {
            background-color: #495057; /* Warna latar belakang link aktif pada sidebar */
        }

        .content {
            background-color: #ffffff; /* Warna latar belakang konten */
            border-radius: 8px; /* Border radius pada konten */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow pada konten */
        }
    </style>
</head>
<body>
    
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-info">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Perpustakaan</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>

          <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo02">
                        @if (Auth::user())
                          @if (Auth::user()->role_id == 1)
                              <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                              <a href="/books" @if(request()->route()->uri == 'books'  || request()->route()->uri == 'book-add' || request()->route()->uri == 'book-edit/{slug}' || request()->route()->uri == 'book-delet/{slug}' || request()->route()->uri == 'book-deleted' || request()->route()->uri == 'book-delete/{slug}') class="active" @endif>Kategori</a>
                              <a href="/categories" @if(request()->route()->uri == 'categories'  || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-delet/{slug}' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-delete/{slug}') class="active" @endif>Kategori</a>
                              <a href="/users" @if(request()->route()->uri == 'users' || request()->route()->uri == 'registered-users' || request()->route()->uri == 'user-detail/{slug}') class="active" @endif>User</a>
                              <a href="/rent-logs" @if(request()->route()->uri == 'rent-logs') class="active" @endif>Rent Log</a>
                              <a href="/" @if(request()->route()->uri == '/') class="active" @endif>list buku</a>
                              <a href="/book-rent" @if(request()->route()->uri == 'book-rent') class="active" @endif >Book Rent</a>
                              <a href="/book-return" @if(request()->route()->uri == 'book-return') class="active" @endif >Book Return</a>
                              <a href="/logout">Logout</a>
                          @else
                              <a href="/profile" @if(request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                              <a href="/" @if(request()->route()->uri == '/') class="active" @endif>list buku</a>
                              <a href="/logout">Logout</a>
                          @endif
                          @else
                          <a href="/login">Login</a>
                        @endif
                    
                </div>
                <div class="content p-5 col-lg-10">@yield('content')</div>
            </div>
          </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
