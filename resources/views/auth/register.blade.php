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
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="container shadow-lg bg-light p-3" style="width: 510px;">
            {{-- for logo --}}
            <div class="my-4 text-center">
                <img class=" d-inline-block img img-fluid" src="{{ asset('images/logo.png') }}" alt="logoimg" width="100px" height="120px">
                <h3><strong><i><b>Register Here</b></i></strong></h3>
            </div>
            {{-- for name --}}
            <div class="mb-3">
                <div>
                    <label class=" form-label" for="name">Name</label>
                    <input class=" form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                </div>
                @error('name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
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
            {{-- for cm password --}}
            <div class="mb-3">
                <div>
                    <label class=" form-label" for="password_confirmation">Comfirm Password</label>
                    <input class=" form-control" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                @error('password_confirmation')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- for age --}}
            <div class="mb-3">
                <div>
                    <label class=" form-label" for="age">Age</label>
                    <input class=" form-control" type="text" name="age" id="age" value="{{ old('age') }}">
                </div>
                @error('age')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- for gender --}}
            <div class="mb-3">
                <label for="gender">Gender</label>
                <select class="form-select form-select-sm" aria-label="Small select example" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            {{-- for phone --}}
            <div class="mb-3">
                <div>
                    <label class=" form-label" for="phone">Phone</label>
                    <input class=" form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
                @error('phone')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            {{-- for condition --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            {{-- for btn --}}
            <div class=" d-flex justify-content-between ">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <div>
                    <input class="btn btn-danger" type="submit" value="Register">
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
