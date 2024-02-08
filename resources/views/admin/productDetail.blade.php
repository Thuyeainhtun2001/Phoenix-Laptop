@extends('admin.layout')
@section('title', 'Product Detail')
@section('content')
    <main class="main" id="main">
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">products</a></li>
                    <li class="breadcrumb-item"><a href="#">products list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">details</li>
                </ol>
            </nav>
        </div>
        {{-- for card --}}
        <div class="card mx-auto" style="width: 600px">
            <img class=" img-fluid mx-auto my-4" src="{{asset('/storage/products/'.$data->image)}}" class="card-img-top" alt="product laptop" width="250px" height="300px">
            <div class="card-body">
                <h5 class="card-title"><i class="fa-solid fa-laptop fs-5 me-3 text-primary"></i>{{$data->name}}</h5>
                <p class="card-text"><i class="fa-solid fa-computer fs-5 me-3 text-primary"></i>{{$data->brand}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fa-regular fa-rectangle-list fs-5 me-3 text-warning"></i>{{$data->description}}</li>
                <li class="list-group-item"><i class="fa-solid fa-dollar-sign fs-5 me-3 text-danger"></i>{{$data->price}}</li>
            </ul>
            <div>
                <a href="{{route('admin.productList')}}">
                    <button class="btn btn-secondary float-end my-2 me-2">
                        <i class="fa-solid fa-arrow-left fs-5 text-white"></i>
                    </button>
                </a>
            </div>
        </div>
    </main>
@endsection
