{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Code Alchemy!</title>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="text-center mt-5">
                <img src="{{ asset('images/logo_main.png') }}" width="130px" alt="">
                <h2 class="gray mt-1"></h2>
                <h5 class="gray">

                </h5>
            </div>

            <div class="card mx-auto mb-3" id="lostpassword">
                <div class="card-body alert alert-dismissible fade show">
                    <a href="#" class="close p-3 mt-2" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="gray">Please enter your username or email address. You will receive a link to create a new password via email.</span>
                </div>
            </div>

            @if ($errors->has('username'))


                <div class="card mx-auto mb-3 animated shake" id="errorlostpassword">
                    <div class="card-body alert alert-dismissible fade show">
                        <a href="#" class="close p-3 mt-2" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="gray"> <b>ERROR:</b> Invalid Email </span>
                    </div>
                </div>
            @endif


            <div class="form animated pulse">
                <div class="card mx-auto" id="login-card">
                    <div class="card-body mt-3">
                        <form class="custom-hover" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="gray">Email</label>

                                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-green">Get a New
                                        Password
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <p class="text-center gray">


                                <a href="{{ route('login') }}" class="gray" style="text-decoration:none">
                                    Log In
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>


            <p class="gray mt-3">
            <ul class="text-center nodecorationlist p-0" style="list-style-type:none;">
                <li>
                    <a class="gray" href="{{ url('/') }}" rel="noopener noreferrer">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Website
                    </a>
                </li>
            </ul>
            </p>
        </div>
        <div class="col-3"></div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>

</body>

</html>
