<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Lecturer - Log In</title>
</head>

<body class="bg-theme-2">
    <!-- login page start-->
    <div class="container">
        <div class="row px-auto mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow p-3 mt-5 mx-auto text-dark">
                    <a class="navbar-brand link-dark mx-auto" href="/"><img
                            src="{{ asset('assets/images/unizik-logo.png') }}" height="60"></a>

                    <h2 class="title my-4">Lecturer Login</h2>
                    <form method="POST" action="{{ route('lecturer.login') }}">
                        @csrf
                        <div class="input form-group mb-3">
                            <label for="email">Email address</label>
                            <input id="email" type="email" class="form-control" name="email" value=""
                                required>
                        </div>

                        @if (Session::has('alert'))
                            <span><strong class="text-danger">{{ Session::get('alert') }}</strong></span>
                        @endif

                        @if ($errors->has('email'))
                            <span><strong>{{ $errors->first('reg_no') }}</strong></span>
                        @endif

                        @if ($errors->has('password'))
                            <span><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                        <div class="input form-group mb-3">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password">
                        </div>
                        <a href="forgot-password" class="py-3 link-dark">Forgot your password?</a>

                        <div class="mt-4">
                            <button type="submit" class="px-3 text-center btn btn-dark border-0 bg-theme btn-block">
                                <span>Log In</span>
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/assets/js/app.js"></script>
</body>

</html>
