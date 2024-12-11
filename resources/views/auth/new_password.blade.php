<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <title>New Password</title>
</head>

<body>
    @if (Session::has('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('update.password') }}" method="POST" for="password-form">
        @csrf
        <h1 class="text-center">JANGAN LUPA LAGI YA BOS, DIINGAT!!!</h1>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                    value="{{ $email }}" name="email">
            </div>
        </div>
        {{-- <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="name">
            </div>
        </div> --}}
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">new Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">new Konfirmasi Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password_confirmation">
            </div>
        </div>
        <div class="">
            <button type="submit">
                CHANGE PASSWORD
            </button>
        </div>
    </form>

    <script>
    // Menambahkan email ke URL sebelum form disubmit
    document.getElementById('password-form').addEventListener('submit', function(e) {
        var email = document.querySelector('input[name="email"]').value;
        if (email) {
            // Menambahkan email sebagai query string ke URL sebelum form disubmit
            var currentUrl = window.location.href.split('?')[0];  // Ambil URL tanpa query string
            var newUrl = currentUrl + '?email=' + encodeURIComponent(email);  // Tambahkan parameter email
            window.location.href = newUrl;  // Redirect ke URL baru dengan query string
        }
    });
</script>
</body>

</html>
