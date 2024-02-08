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
                    <li class="breadcrumb-item"><a href="#">Products list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products edit</li>
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
                {{-- {{dd($productData->toArray())}} --}}
                {{-- {{dd($categoryData->toArray())}} --}}
                <div class="card">
                    {{-- back btn --}}
                    <div class="m-2">
                        <a href="{{ route('admin.productList') }}">
                            <button class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left fs-5"></i>
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-title text-center">
                            <strong><i>Edit Products</i></strong>
                        </div>
                        {{-- for image --}}
                        @if ($productData->image == null)
                            <div class="text-center mb-3">
                                <img src="{{ asset('images/noimage.png') }}" alt="no img" width="300px" height="250px">
                            </div>
                        @else
                            <div class="text-center mb-3">
                                <img class="" src="{{ asset('storage/products/' . $productData->image) }}"
                                    alt="no img" width="300px" height="250px">
                            </div>
                        @endif
                        <div class=" form">
                            <form action="{{ route('admin.updateProdut', $productData->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- for image --}}
                                <div class="form-group mb-3">
                                    <input class="form-control" type="file" name="productImage" id="productImage">
                                    @error('productImage')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for name --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('productName') is-invalid @enderror" type="text"
                                        name="productName" id="productName" value="{{ $productData->name }}">
                                    @error('productName')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for brand --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('productBrand') is-invalid @enderror" type="text"
                                        name="productBrand" id="productBrand" value="{{ $productData->brand }}">
                                    @error('productBrand')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for selext box --}}
                                <div class="form-group mb-3">
                                    <select class="form-select form-select-sm" aria-label="Small select example"
                                        name="selectProduct" id="selectProduct">
                                        <option value="">Choose Category</option>
                                        @foreach ($categoryData as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($productData->category_id == $category->id) selected @endif>{{ $category->name }}
                                            </option>
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
                                        id="productDescription" cols="30" rows="3">{{ $productData->description }}</textarea>
                                    @error('productDescription')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- for price --}}
                                <div class="form-group mb-3">
                                    <input class="form-control @error('productPrice') is-invalid @enderror" type="number"
                                        name="productPrice" id="productPrice" value="{{ $productData->price }}">
                                    @error('productPrice')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" float-end">
                                    <input class="btn btn-success" type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
