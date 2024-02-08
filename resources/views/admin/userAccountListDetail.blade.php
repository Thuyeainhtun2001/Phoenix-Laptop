@extends('admin.layout')
@section('title', 'User Account Detail')
@section('content')
    <main class="main" id="main">
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">accounts</a></li>
                    <li class="breadcrumb-item"><a href="#">user account list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">details</li>
                </ol>
            </nav>
        </div>
        {{-- for card --}}
        <div class="card mx-auto" style="width: 600px">
            @if ($data->image == null)
                <img class=" img-fluid mx-auto my-4" src="{{ asset('images/noimage.png') }}" class="card-img-top"
                    alt="product laptop" width="250px" height="300px">
            @else
                <img class=" img-fluid mx-auto my-4" src="{{ asset('/storage/profile/' . $data->image) }}"
                    class="card-img-top" alt="product laptop" width="250px" height="300px">
            @endif
            <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-user-large fs-5 me-2 text-primary"></i>{{$data->name}}</h5>
                <p class="card-text"><i class="fa-solid fa-envelope fs-5 me-2 text-primary"></i>{{$data->email}}</p>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa-solid fa-venus-mars fs-5 me-2 text-primary"></i>{{$data->gender}}</li>
                <li class="list-group-item"><i class="fa-solid fa-address-card fs5 me-2 text-primary"></i>{{$data->address}}</li>
                <li class="list-group-item"><i class="fa-solid fa-phone-volume fs-5 me-2 text-primary"></i>{{$data->phone}}</li>
            </ul>
            <div class=" d-flex justify-content-between align-items-center p-4">
                <a href="{{route('promoteToAdmin',$data->id)}}">
                    <button class="btn btn-warning" title="change to admin">
                        Promote To Admin
                    </button>
                </a>
                <a href="{{route('admin.userList')}}">
                    <button class="btn btn-secondary" title="back">
                        <i class="fa-solid fa-arrow-left fs-5 text-white"></i>
                    </button>
                </a>
            </div>
        </div>
    </main>
@endsection
