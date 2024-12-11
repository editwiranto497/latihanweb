<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>

<body>
    <div class="container">
        <div class="main rounded-2">
            <div class="form">
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <h2>Forgot Your Password</h2>
                <p>Please enter your mail to password reset request</p>
                {{-- {{ route(password.email) }} --}}
                <form action="{{ route('latihan') }}" method="post">
                    @csrf
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                    <input type="submit" value="Request Password Reset" class="btn btn-primary w-100 mt-3">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
