<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>
    <div class="main">
        <div class="form">
            @if ($errors->any())
                <div class="alert alert-danger"></div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $errors }}</li>
                        @endforeach
                    </ul>
            @endif
            @if (session()->has('status'))
                <div class="alert alert-sucess">
                    {{ session()->get('status') }}
                </div>
            @endif

            <h2>Forgot Your Password</h2>
            <p>Please enter your mail to password reset request</p>
            {{-- {{ route(password.email) }} --}}
           <form action="" method="post">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                <input type="submit" value="Request Password Reset" class="btn btn-primary w-100 mt-3">
           </form>
        </div>
    </div>
</body>
</html>
