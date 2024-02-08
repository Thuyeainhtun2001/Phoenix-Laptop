@extends('admin.layout')
@section('title', 'Product List')
@section('content')
    <main id="main" class="main">
        <h2 class="text-center">Product Lists-{{ $data->total() }}</h2>
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
                    <li class="breadcrumb-item"><a href="#">products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">product Lists</li>
                </ol>
            </nav>
        </div>
        @if (count($data) == 0)
            <h2>There is <strong><i class=" text-primary">No Data!</i></strong></h2>
        @else
            {{-- for table --}}
            <div class=" container-fluid mt-3">
                <table class="table">
                    <thead>
                        <tr class="">
                            <th class="col-lg-2">ID</th>
                            <th class="col-lg-2">Name</th>
                            <th class="col-lg-2">Series</th>
                            <th class="col-lg-2">Categoy Name</th>
                            <th class="col-lg-2">Created_at</th>
                            <th class="col-lg-2">Edit/Delete</th>
                        </tr>
                    </thead>
                    {{-- for looping --}}
                    @foreach ($data as $data)
                        <tbody>
                            <tr class="">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->brand }}</td>
                                <td>{{ $data->category_name}}</td>
                                <td>{{ $data->created_at->format('j / F / Y') }}</td>
                                <td>
                                    <div class="mt-3">
                                        <a href="{{route('admin.productDetail',$data->id)}}">
                                            <button class="btn btn-primary me-2" title="product detail">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('admin.productEdit',$data->id)}}">
                                            <button class="btn btn-warning me-2" title="product edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('admin.productDelete',$data->id)}}">
                                            <button class="btn btn-danger" title="product delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </a>
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
