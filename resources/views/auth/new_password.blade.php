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
    <style>
        body{
            background-color: rgb(221, 219, 219);
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form{
            background-color: #fff;
            padding: 20px;
        }
        .row{
            display: flex;
            justify-content: space-between;
        }
        .row label{
            width: 40%;
        }
    </style>
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
    <div class="container">
        <form action="{{ route('update.password') }}" method="POST" for="password-form" class="rounded-3 shadow">
            @csrf
            <h1 class="text-center mb-3">JANGAN LUPA LAGI YA BOS</h1>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $email }}" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><strong style="color: red;">new</strong> Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><strong style="color: red;">new</strong> Konfirmasi Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="inputPassword" name="password_confirmation">
                </div>
            </div>
            <div class="d-flex justify-content-center" width="100%" style="margin-top: 30px;">
                <button type="submit" class="btn btn-outline-primary">
                    CHANGE PASSWORD
                </button>
            </div>
        </form>
    </div>

    <script>
        // Menambahkan email ke URL sebelum form disubmit
        document.getElementById('password-form').addEventListener('submit', function(e) {
            var email = document.querySelector('input[name="email"]').value;
            if (email) {
                // Menambahkan email sebagai query string ke URL sebelum form disubmit
                var currentUrl = window.location.href.split('?')[0]; // Ambil URL tanpa query string
                var newUrl = currentUrl + '?email=' + encodeURIComponent(email); // Tambahkan parameter email
                window.location.href = newUrl; // Redirect ke URL baru dengan query string
            }
        });
    </script>
</body>

</html>
