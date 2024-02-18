<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
    .main{
        height: 100vh;
    }

    .register-box{
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }
    form div {
        margin-bottom: 15px;
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if ($errors->any())
        <div class="alert alert-danger" style="width: 500px;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success" style="width: 500px;">
            {{ session('message')}}
        </div>
    @endif
        <div class="register-box">
        <form action="" method="post">
            @csrf
            <div class="">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="">
                <label for="phine" class="form-label">Nomor</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="">
                <label for="address" class="form-label">Alamat</label>
                <textarea type="text" name="address" id="address" class="form-control" rowa="5" required></textarea>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </div>
            <div class="text-center">
                Have Account?<a href="login">Login</a>
            </div>

        </form>
        </div>
    </div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>