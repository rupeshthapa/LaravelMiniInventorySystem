<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 shadow-sm">
                    <div class="card-body">


                        @if(session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                        @endif

                        @if (session('danger'))
                            <p style="color: red;">{{ session('danger') }}</p>
                        
                            
                        @endif

                        <h2 class="card-title text-center">Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control">
                            @error('email')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        </form>
                        <p class="lead">If you don't have an account <a href="{{ route('rRegister') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>