<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LANDING PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
  rel="stylesheet"
/>

</head>

<body>

    <div class="container">
        <div class="card-group">
            <div class="card border border-0 background_web">
            </div>
            <div class="card border border-0 d-flex justify-content-center text-start login_page">
                <div class="sign-in text-end">
                    <p class="text">Already Have Account ??</p>
                    <a href="/"><i class="bi bi-lock-fill" style="margin-right: 5px;"></i>LOGIN</a>
                </div>
                <div class="sign-up">
                    <label><STRONG>SIGN UP NOW</STRONG></label>
                    <p class="text"><i>Selamat datang di halaman register,Semoga Nyaman !!</i></p>
                </div>
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
                    </div>
                     @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                     @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <input type="Password" class="form-control" placeholder="Password" name="password">
                    </div>
                     @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <input type="Password" class="form-control" placeholder="Password Konfirmasi" name="password_confirmation">
                    </div>
                     @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="button">
                        <button type="submit" class="btn btn-outline-dark rounded-pill">LET'S GO</button>
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
