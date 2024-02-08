@extends('layout')
@section('title', 'Profile')
@section('content')
    <section>
        {{-- for update success message --}}
        <div class="text-center">
            @if (session('success'))
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- for error message --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="row d-flex justify-content-center p-5">
            {{-- right side --}}
            <div class="card col-lg-3 mt-5 rounded-3 p-3" style="width: 18rem; height: 340px;">
                {{-- condition for image --}}
                @if (Auth::user()->image == null)
                    <img src="{{ asset('images/noimage.png') }}" class="card-img-top rounded-circle" alt="no Img"
                        width="250px" height="250px">
                @else
                    <img src="{{ asset('storage/profile/' . Auth::user()->image) }}" class="card-img-top rounded-circle"
                        alt="no Img" width="250px" height="250px">
                @endif
                <div class="card-body">
                    <h2>
                        {{ Auth::user()->name }}
                    </h2>
                </div>
            </div>
            {{-- left side --}}
            <!-- Card Layout-->
            <div class="col-lg-8 mt-lg-5 mt-2">
                <div class="card">
                    <div class="card-body pt-3">

                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change
                                    Password</button>
                            </li>

                        </ul>

                        <div class="tab-content pt-2">
                            <!-- Overview Tab -->
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title mt-2">Profile Details</h5>

                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Name:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Email:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Age:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->age }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Gender:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->gender }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Phone:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Address:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-4 label ">Role:</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->role }}</div>
                                </div>
                            </div>
                            <!-- End Overview Tab -->

                            <!-- Edit Profile Tab -->
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                {{-- for photo --}}
                                <div class="rounded-2 mx-auto mb-3 " style="width: 150px; height:150px;">
                                    {{-- condition for image --}}
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('images/noimage.png') }}" class="card-img-top rounded-circle"
                                            alt="no Img" width="150px" height="150px">
                                    @else
                                        <img src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                                            class="card-img-top rounded-circle" alt="no Img" width="150px"
                                            height="150px">
                                    @endif
                                </div>
                                <form action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data"
                                    class="text-center">
                                    @csrf
                                    <div>
                                        <div class="mb-3">
                                            <label class=" form-label me-3" for="image">Image:</label>
                                            <input class="form-control text-center d-inline-block" type="file"
                                                name="image" id="image" style="width:320px;">
                                            @error('image')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- for name --}}
                                        <div class="mb-3">
                                            <label class=" form-labe me-3" for="name">Name:</label>
                                            <input
                                                class="form-control text-center d-inline-block  @error('phone') is-invalid @enderror"
                                                type="text" name="name" id="name" style="width:320px;"
                                                value="{{ old('name', Auth::user()->name) }}">
                                            @error('name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- gender --}}
                                        <div class="mb-3">
                                            <label class=" form-label me-1" for="gender">Gender:</label>
                                            <input
                                                class="form-control text-center d-inline-block  @error('phone') is-invalid @enderror"
                                                type="text" name="gender" id="gender" style="width:320px;"
                                                value="{{ old('gender', Auth::user()->gender) }}">
                                            @error('gender')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- age --}}
                                        <div class="mb-3">
                                            <label class=" form-label me-4" for="age">Age:</label>
                                            <input
                                                class="form-control text-center d-inline-block  @error('phone') is-invalid @enderror"
                                                type="text" name="age" id="age" style="width:320px;"
                                                value="{{ old('age', Auth::user()->age) }}">
                                            @error('age')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- phone --}}
                                        <div class="mb-3">
                                            <label class=" form-label me-3" for="phone">Phone:</label>
                                            <input
                                                class="form-control text-center d-inline-block @error('phone') is-invalid @enderror"
                                                type="text" name="phone" id="phone" style="width:320px;"
                                                value="{{ old('phone', Auth::user()->phone) }}">
                                            @error('phone')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- address --}}
                                        <div class="mb-3 d-flex align-items-center justify-content-center">
                                            <label class=" form-label" for="address">Address:</label>
                                            <textarea class="form-control text-center d-inline-block" name="address" id="address" cols="30"
                                                rows="3" style="width:320px;">{{ old('address', Auth::user()->address) }}</textarea>
                                        </div>
                                        {{-- for btn --}}
                                        <div class="text-center">
                                            <input class="btn btn-success" type="submit" value="Save">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- End Edit Profile Tab -->

                            <!-- Change Password Tab -->
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form action="{{route('profile.password')}}" method="post">
                                    @csrf
                                    <div class="row text-center">
                                        {{-- for old password --}}
                                        <div class="mb-3">
                                            <label class=" form-label" for="oldPassword">Old Password:</label>
                                            <input class=" mx-auto form-control w-50" type="password" name="oldPassword"
                                                id="oldPassword">
                                                @error('oldPassword')
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        {{-- for new password --}}
                                        <div class="mb-3 ">
                                            <label class=" form-label" for="newPassword">New Password:</label>
                                            <input class="mx-auto form-control w-50" type="password" name="newPassword"
                                                id="newPassword">
                                                @error('newPassword')
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        {{-- for old password --}}
                                        <div class="mb-3">
                                            <label class=" form-label" for="cmPassword">Comfirm Password:</label>
                                            <input class="mx-auto form-control w-50" type="password" name="cmPassword"
                                                id="cmPassword">
                                                @error('cmPassword')
                                                    <div class="text-danger">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                        </div>
                                        {{-- for btn --}}
                                        <div>
                                            <input class="btn btn-success" type="submit" value="Save">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Change Password Tab -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Card Layout-->
        </div>
    </section>
@endsection
