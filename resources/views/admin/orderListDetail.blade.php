@extends('admin.layout')
@section('title', 'Order List Detail')
@section('content')
    <main class="main" id="main">
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">order</a></li>
                    <li class="breadcrumb-item"><a href="#">order list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">details</li>
                </ol>
            </nav>
        </div>
        {{-- for user name --}}
        <div class="mb-5 row mx-auto w-50 shadow bg-primary rounded-4">
            <div class="text-center p-3">
                <h4 class="text-white"><strong><i>{{$data2->user_name}}</i></strong></h4>
                <h5 class="text-white">{{$data2->order_number}}</h5>
            </div>
        </div>
        {{-- for card --}}
        @foreach ($data1 as $orderDetailData)
            <div class="card mx-auto" style="width: 600px">
                <img class=" img-fluid mx-auto my-4" src="{{asset('/storage/products/'.$orderDetailData->product_image)}}" class="card-img-top" alt="product laptop" width="250px"
                    height="300px">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-laptop fs-5 me-3 text-primary"></i>{{$orderDetailData->product_name}}</h5>
                    <p class="card-text"><i class="fa-solid fa-computer fs-5 me-3 text-primary"></i>{{$orderDetailData->product_des}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa-solid fa-dollar-sign fs-5 me-3 text-danger"></i>{{$orderDetailData->product_price}} (price for one)</li>
                    <li class="list-group-item"><i class="fa-solid fa-ranking-star fs-5 me-3 text-primary"></i></i>{{$orderDetailData->qty}} (qty)</li>
                    <li class="list-group-item"><i class="fa-solid fa-dollar-sign fs-5 me-3 text-danger"></i>{{$orderDetailData->total}} (total)</li>
                </ul>
                <div>
                    <a href="{{route('orderList')}}">
                        <button class="btn btn-secondary float-end my-2 me-2">
                            <i class="fa-solid fa-arrow-left fs-5 text-white"></i>
                        </button>
                    </a>
                </div>
            </div>
        @endforeach
    </main>
@endsection
