@extends('admin.layout')
@section('title', 'Create Products')
@section('content')
    <main class="main" id="main">
        <h2 class="text-center">Create Products</h2>
        {{-- for breadcrumb --}}
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.content') }}">Admin Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Products</li>
                </ol>
            </nav>
        </div>
        {{-- for form --}}
        <div class=" container-fluid">
            <div class=" col-lg-6 offset-3">
                {{-- for success message --}}
                @if (session('success'))
                    <div class="alert alert-warning text-center d-flex justify-content-center align-items-center"
                        role="alert">
                        <i class="fa-solid fa-circle-check me-2 fs-2"></i>{{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <strong><i>Create Products</i></strong>
                        </div>
                        <div class=" form">
                            <form action="{{ route('admin.inputProduct') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{-- for name --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('productName') is-invalid @enderror" type="text"
                                        name="productName" id="productName" placeholder="Product Name">
                                    @error('productName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for brand --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('productBrand') is-invalid @enderror" type="text"
                                        name="productBrand" id="productBrand" placeholder="Product Series">
                                    @error('productBrand')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for selext box --}}
                                <div class="form-group mb-3">
                                    <select class="form-select form-select-sm" aria-label="Small select example" name="selectProduct" id="selectProduct">
                                        <option>Select the category name</option>
                                        @foreach ($data as $categoryData)
                                            <option value="{{ $categoryData->id }}">{{ $categoryData->name }}</option>
                                        @endforeach
                                        @error('selectProduct')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                        @enderror
                                    </select>
                                </div>
                                {{-- for description --}}
                                <div class="form-group mb-3">
                                    <textarea class="form-control @error('categoryDescription') is-invalid @enderror" name="productDescription"
                                        id="productDescription" cols="30" rows="3" placeholder="Description"></textarea>
                                    @error('productDescription')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for price --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('productPrice') is-invalid @enderror" type="number"
                                        name="productPrice" id="productPrice" placeholder="Product Price">
                                    @error('productPrice')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for image --}}
                                {{-- for btn --}}
                                <div class="form-group mb-3">
                                    <input class="form-control" type="file" name="productImage" id="productImage">
                                    @error('productImage')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
