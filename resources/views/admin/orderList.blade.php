@extends('admin.layout')
@section('title', 'Order List')
@section('content')
    <main id="main" class="main">
        <h2 class="text-center">Order Lists-{{ $data->total() }}</h2>
        {{-- for pagination --}}
        <div>
            {{ $data->links() }}
        </div>
        {{-- for success message --}}
        @if (session('success'))
            <div class="alert alert-warning text-center d-flex justify-content-center align-items-center" role="alert">
                <i class="fa-solid fa-circle-check me-2 fs-2"></i>{{ session('success') }}
            </div>
        @endif
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">order Lists</li>
                </ol>
            </nav>
        </div>
        @if (count($data) == 0)
            <h2 class="text-center">There is <strong><i class=" text-primary">No Data!</i></strong></h2>
        @else
            {{-- for table --}}
            <div class=" container-fluid mt-3">
                <table class="table">
                    <thead>
                        <tr class="">
                            <th class="col-lg-1">ID</th>
                            <th class="col-lg-1">Name</th>
                            <th class="col-lg-1">OrderNumber</th>
                            <th class="col-lg-1">Total Amount</th>
                            <th class="col-lg-1">Order_delivered</th>
                            <th class="col-lg-2">Created_at</th>
                            <th class="col-lg-1"></th>
                        </tr>
                    </thead>
                    {{-- for looping --}}
                    @foreach ($data as $data)
                        <tbody>
                            <tr class="">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->user_name }}</td>
                                <td>{{ $data->order_number }}</td>
                                <td>{{ $data->total_amount }}</td>
                                <td>{{ $data->order_delivered }}</td>
                                <td>{{ $data->created_at->format('j / F / Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center ">
                                        <a href="{{route('order.detail',$data->order_number)}}">
                                            <button class="btn btn-primary me-2" title="order details">
                                                <i class="fa-solid fa-circle-info fs-5 me-2"></i>
                                            </button>
                                        </a>
                                        @if ($data->order_delivered == 0)
                                            <a href="{{ route('deliver', $data->order_number) }}">
                                                <button class="btn btn-warning me-2" title="order deliver">
                                                    <i class="fa-solid fa-truck me-2"></i>Deliver
                                                </button>
                                            </a>
                                        @else
                                            <a href="{{ route('delete', $data->order_number) }}">
                                                <button class="btn btn-danger" title="order delete">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        @endif
    </main>
@endsection
