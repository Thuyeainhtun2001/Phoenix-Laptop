@extends('admin.layout')
@section('title', 'User Account List')
@section('content')
    <main id="main" class="main">
        <h2 class="text-center">User Lists-{{ $data->total() }}</h2>
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
                    <li class="breadcrumb-item"><a href="#">accounts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">user account Lists</li>
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
                            <th class="col-lg-2">Age</th>
                            <th class="col-lg-2">role</th>
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
                                <td>{{ $data->age}}</td>
                                <td>{{ $data->role}}</td>
                                <td>{{ $data->created_at->format('j / F / Y') }}</td>
                                <td>
                                    <div class="mt-3">
                                        <a href="{{route('user.detail',$data->id)}}">
                                            <button class="btn btn-primary me-2" title="user account detail">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('user.delete',$data->id)}}">
                                            <button class="btn btn-danger" title="user account list delete">
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
