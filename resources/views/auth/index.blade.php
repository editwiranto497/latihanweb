<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LANDING PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <div class="card-group">
            <div class="card border border-0 background_web">
            </div>
            <div class="card border border-0 d-flex justify-content-center text-start login_page">
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
                <p><span class="partial-underline">Hello!</span></p>
                <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint quidem iste voluptate
                    minus maiores amet assumenda eaque hic, eius quod expedita soluta? Id illo fugiat praesentium,
                    laborum hic velit molestias.</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 border d-flex justify-content-center align-items-center px-3 rounded-3">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control border border-0" placeholder="Email or Username"
                            name="email_or_username"
                            @if (Cookie::has('username') && Cookie::has('email')) value="{{ Cookie::get('username') }} - {{ Cookie::get('email') }}" @endif>
                    </div>
                    @error('email_or_username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3 border d-flex justify-content-center align-items-center px-3 rounded-3">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" class="form-control border border-0" id="formGroupExampleInput"
                            placeholder="Password" name="password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="validation d-flex justify-content-between px-3">
                        <div class="checkbox">
                            <input type="checkbox" id="cek" name="rememberme" required>
                            <label for="cek">Remember</label>
                        </div>
                        @error('rememberme')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="forgot-password">
                            <a href="{{ route('resetPassword') }}">Forgot your Password ?</a>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn">
                            <strong>NEXT &nbsp;&nbsp;<i class="bi bi-arrow-right fs-5"></i></strong>
                        </button>
                    </div>
                    <div class="register" style="margin-top: 5px;margin-left:5px;">
                        <a href="/register">Create Account</a>
                        <a href="/latihan">Send Email</a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
