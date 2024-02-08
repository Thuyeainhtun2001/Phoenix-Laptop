@extends('layout')
@section('title', 'Shop')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <main class="main" id="main">
        <div class="container shadow-lg" style="margin-top:200px; padding:50px">
            <div class="row">
                {{-- image --}}
                <div class="col-lg-4">
                    <img class="img img-fluid" src="{{ asset('storage/products/' . $data->image) }}" alt="laptop"
                        width="300px" height="200px">
                </div>
                {{-- details --}}
                <div class="col-lg-8">
                    <h3><i class="fa-solid fa-laptop fs-5 me-3 text-primary"></i>{{ $data->category_name }}</h3><br>
                    <h5><i class="fa-solid fa-cube fs-5 me-3 text-primary"></i>{{ $data->name }}</h5><br>
                    <p><i class="fa-solid fa-list-ul fs-5 me-3 text-secondary"></i>{{ $data->description }}</p><br>
                    <h5><i class="fa-solid fa-dollar-sign fs-5 me-3 text-danger"></i>{{ $data->price }}</h5><br>
                    <div>
                        <i class="fa-solid fa-star me-2 fs-5 text-warning"></i>
                        <i class="fa-solid fa-star me-2 fs-5 text-warning"></i>
                        <i class="fa-solid fa-star me-2 fs-5 text-warning"></i>
                        <i class="fa-solid fa-star-half me-2 fs-5 text-warning"></i>
                        <i class="fa-regular fa-star me-2 fs-5 text-warning"></i>
                    </div><br>
                    @if (Auth::user())
                        @if (Auth::user()->role == 'user')
                            <div class="d-flex">
                                <button class="btn btn-danger me-2" id="minusBtn"><i
                                        class="fa-solid fa-minus"></i></button>
                                <input class="form-control me-2 text-center" type="text" name="qty" id="qty"
                                    value="1" style="width: 60px">
                                <button class="btn btn-danger me-3" id="plusBtn"><i class="fa-solid fa-plus"></i></button>
                                <button class="btn btn-danger" id="cartBtn">
                                    <i class="fa-solid fa-cart-shopping fs-5 me-3 text-white"></i> Add To Cart
                                </button>
                                <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="productId" id="productId" value="{{ $data->id }}">
                            </div>
                        @endif
                    @else
                        <div class="alert alert-primary" role="alert">
                            If you want to buy our products, please, login or register our website. <a
                                href="{{ route('login') }}" class="alert-link"><strong>LogIn</strong></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
{{-- for jQuery --}}
@section('jQuery')
    <script>
        $('document').ready(function() {
            // ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let qty = parseInt($('#qty').val());
            // for plus btn
            $('#plusBtn').click(function() {
                qty = qty + 1
                // to show in qty value
                $('#qty').val(qty);
            })
            // for minus
            $('#minusBtn').click(function() {
                if (qty > 1) {
                    qty = qty - 1;
                    $('#qty').val(qty);
                }
            })
            // for cart
            $('#cartBtn').click(function() {
                let userId = $('#userId').val();
                let productId = $('#productId').val();
                // console.log(userId);
                // console.log(productId);
                // console.log(qty);
                $.ajax({
                    type: 'post',
                    url: '/cart/add/',
                    data: {
                        'userId': userId,
                        'productId': productId,
                        'qty': qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = "http://localhost:8000/";
                    }
                });
            })
        });
    </script>
@endsection
