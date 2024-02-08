@extends('admin.layout')
@section('title', 'Category List')
@section('content')
    <main id="main" class="main">
        <h2 class="text-center">Category Lists-{{ $data->total() }}</h2>
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
                    <li class="breadcrumb-item"><a href="#">Components</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category Lists</li>
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
                        <tr class="text-center">
                            <th class="col-lg-2">ID</th>
                            <th class="col-lg-2">Name</th>
                            <th class="col-lg-3">Description</th>
                            <th class="col-lg-2">Created_at</th>
                            <th class="col-lg-2">Edit/Delete</th>
                        </tr>
                    </thead>
                    {{-- for looping --}}
                    @foreach ($data as $data)
                        <tbody>
                            <tr class="text-center">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->created_at->format('j / F / Y') }}</td>
                                <td>
                                    <div class="mt-3">
                                        <a href="{{ route('category.edit', $data->id) }}">
                                            <button class=" text-bg-warning me-3 border-0 p-2" title="category edit">
                                                <i class="fa-solid fa-pen-to-square fs-4"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('category.delete',$data->id)}}">
                                            <button class=" text-bg-danger border-0 p-2" title="category delete">
                                                <i class="fa-solid fa-trash-can fs-4"></i>
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
