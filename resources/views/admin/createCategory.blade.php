@extends('admin.layout')
@section('title', 'Create Category')
@section('content')
    <main class="main" id="main">
        <h2 class="text-center">Create Category</h2>
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Components</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Category</li>
                </ol>
            </nav>
        </div>
        {{-- for form --}}
        <div class=" container-fluid">
            <div class=" col-lg-6 offset-3">
                {{-- for success message --}}
                @if (session('success'))
                    <div class="alert alert-warning text-center d-flex justify-content-center align-items-center" role="alert">
                        <i class="fa-solid fa-circle-check me-2 fs-2"></i>{{session('success')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <strong><i>Create New Category</i></strong>
                        </div>
                        <div class=" form">
                            <form action="{{ route('category.createCategory') }}" method="post">
                                @csrf
                                {{-- for name --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('categoryName') is-invalid @enderror"
                                        type="text" name="categoryName" id="categoryName" placeholder="Category Name">
                                    @error('categoryName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for description --}}
                                <div class="form-group mb-3">
                                    <textarea class="form-control @error('categoryDescription') is-invalid @enderror" name="categoryDescription"
                                        id="categoryDescription" cols="30" rows="3" placeholder="Description"></textarea>
                                    @error('categoryDescription')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for btn --}}
                                <div class=" float-end">
                                    <input class="btn btn-success" type="submit" value="Create">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
