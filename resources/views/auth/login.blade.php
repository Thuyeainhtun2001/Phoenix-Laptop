<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    {{-- bootstrap cnd link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: seashell">
    {{-- for success message --}}
    <div class="text-center">
        @if (session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
    </div>
    <form action="{{ route('login') }}" method="post" style="margin-top: 100px;" class="rounded-3">
        @csrf
        <div class="container shadow-lg bg-light p-3" style="width: 510px;">
            {{-- for logo --}}
            <div class="my-4 text-center">
                <img class=" d-inline-block img img-fluid" src="{{ asset('images/logo.png') }}" alt="logoimg" width="100px" height="120px">
                <h3><strong><i><b>Login Here</b></i></strong></h3>
            </div>
            {{-- for email --}}
            <div class="mb-3">
                <div>
                    <label class=" form-label" for="email">Email</label>
                    <input class=" form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- for password --}}
            <div class="mb-3">
                <div>
                    <label class=" form-label" for="password">Password</label>
                    <input class=" form-control" type="password" name="password" id="password">
                </div>
                @error('password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- for btn --}}
            <div class=" d-flex justify-content-between ">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <div>
                    <input class="btn btn-danger" type="submit" value="Login">
                </div>
            </div>
        </div>
    </form>
</body>
{{-- bootstrap js cdn link --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
