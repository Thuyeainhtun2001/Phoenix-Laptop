@extends('admin.layout')
@section('title', 'Contact Detail')
@section('content')
    <main class="main" id="main">
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">contact</a></li>
                    <li class="breadcrumb-item"><a href="#">contact list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">details</li>
                </ol>
            </nav>
        </div>
        {{-- for card --}}
        <div class="card mx-auto" style="width: 600px">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-laptop fs-5 me-3 text-primary"></i>{{$data->name}}</h5>
                <p class="card-text"><i class="fa-solid fa-envelope fs-5 me-3 text-primary"></i>{{$data->email}}</p>
                <p class="card-text"><i class="fa-solid fa-phone-volume fs-5 me-3 text-primary"></i>{{$data->phone}}</p>
                <p class="card-text"><i class="fa-solid fa-message fs-5 me-3 text-primary"></i>{{$data->message}}</p>
            </div>
            <div>
                <a href="{{route('contactList')}}">
                    <button class="btn btn-secondary float-end my-2 me-2">
                        <i class="fa-solid fa-arrow-left fs-5 text-white"></i>
                    </button>
                </a>
            </div>
        </div>
    </main>
@endsection
