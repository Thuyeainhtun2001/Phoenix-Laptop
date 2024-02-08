@extends('layout')
@section('title', 'Cart List')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <main id="main" class="main" style="margin-top: 100px">
        @if (count($data) == 0)
            <h4 class="text-center">There is <strong><i class="text-danger">No Data</i></strong></h4>
        @else
            <div class="row shadow-xl">
                {{-- left side --}}
                <div class="col-lg-9 col-12 p-5">
                    <table class="table table-borderless text-center">
                        <tbody>
                            @foreach ($data as $cartData)
                                <tr class="row border-bottom">
                                    <td
                                        class=" deleteBtn col-md-2 col-12 d-block d-md-none d-flex align-items-center justify-content-center">
                                        <h5><i class="fa-solid fa-square-xmark fs-2"></i></h5>
                                    </td>
                                    <td class="col-md-2 col-12 text-center">
                                        <img class="w-100 img-fluid "
                                            src="{{ asset('/storage/products/' . $cartData->product_image) }}"
                                            alt="laptop">
                                    </td>
                                    <td class="col-md-2 col-12 d-flex align-items-center justify-content-center">
                                        <h5><i>{{ $cartData->product_name }}</i></h5>
                                    </td>
                                    <td class="col-md-2 col-12 d-flex align-items-center justify-content-center">
                                        <h6><i class="fa-solid fa-dollar-sign fs-5 text-danger me-2"></i><span
                                                id="price">{{ $cartData->product_price }}</span>
                                        </h6>
                                    </td>
                                    <td class="col-md-2 col-12 d-flex align-items-center justify-content-center">
                                        <div class="d-flex m-md-2">
                                            <button class="minusBtn btn btn-danger me-2" id="minusBtn"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <input class="form-control me-2" type="text" name="qty" id="qty"
                                                value="{{ $cartData->qty }}" style="width: 50px">
                                            <button class="plusBtn btn btn-danger" id="plusBtn"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="col-md-2 col-12 d-flex align-items-center justify-content-center">
                                        <h6><i class="fa-solid fa-dollar-sign fs-5 text-danger me-2 ms-2"></i><span
                                                id="total">{{ $cartData->product_price * $cartData->qty }}</span>
                                        </h6>
                                    </td>
                                    <td class="col-md-2 col-12 d-flex align-items-center justify-content-center">
                                        <h5 class=" deleteBtn d-none d-md-inline-block"><i
                                                class="fa-solid fa-square-xmark fs-2"></i>
                                        </h5>
                                        {{-- for cartId --}}
                                        <input type="hidden" name="cartId" id="cartId" value="{{ $cartData->id }}">
                                        {{-- for prodcutId --}}
                                        <input type="hidden" name="productId" id="productId"
                                            value="{{ $cartData->product_id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- right side --}}
                <div class="col-lg-3 col-12 p-5 mx-auto my-auto">
                    <div class="text-center">
                        <h3 class="text-danger">Bill Cards</h3>
                    </div>
                    {{-- bill card --}}
                    <div class="text-center mb-4">
                        <a href=""><img class=" img-fluid" src="{{ asset('images/american express.png') }}"
                                alt="bill card" width="80px" height="40px"></a>
                        <a href=""><img class=" img-fluid" src="{{ asset('images/master.png') }}" alt="bill card"
                                width="80px" height="40px"></a>
                        <a href=""><img class=" img-fluid" src="{{ asset('images/visa.png') }}" alt="bill card"
                                width="80px" height="40px"></a>
                        <a href=""><img class=" img-fluid" src="{{ asset('images/discover.png') }}" alt="bill card"
                                width="80px" height="40px"></a>
                    </div>
                    {{-- for subtotal and shipping --}}
                    <div>
                        {{-- subtotal --}}
                        <div class="d-flex justify-content-between mb-2">
                            <h6>Subotal</h6>
                            <h6 id="subtotal"><i
                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $subtotal }}</h6>
                        </div>
                        {{-- shipping --}}
                        <div class="d-flex justify-content-between">
                            <h6>Shipping</h6>
                            <h6><span><i class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>50</span></h6>
                        </div>
                    </div>
                    <hr>
                    {{-- total price --}}
                    <div class="d-flex justify-content-between mb-5">
                        <h6>Total</h6>
                        <h6><span id="totalPrice"><i
                                    class="fa-solid fa-dollar-sign fs-5 me-2 text-danger"></i>{{ $subtotal + 50 }}</span>
                        </h6>
                    </div>
                    {{-- for order and cancel --}}
                    <div class="mb-4 d-flex justify-content-center align-items-center">
                        {{-- order btn --}}
                        <div class="col-lg-6 me-2">
                            <button class="btn btn-primary d-inline-block" title="order products" id="orderBtn"><i class="fa-regular fa-money-bill-1 fs-4 me-2"></i>Order</button>
                        </div>
                        {{-- cancel --}}
                        <div class="col-lg-6">
                            <a href="{{ route('cancel') }}">
                                <button class="btn btn-danger d-inline-block"><i class="fa-solid fa-circle-xmark fs-4 me-2"></i>Cancel</button>
                            </a>
                        </div>
                    </div>
                    {{-- notic for order --}}
                    <div class="alert alert-warning" role="alert">
                        Shipping time may be about one week. <br>
                        After order, we will send voucher detail to your email.
                        Thanks for shipping.
                    </div>
                </div>
            </div>
        @endif
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
            // plusBtn
            $('.plusBtn').click(function() {
                let tr = $(this).parents('tr');
                let qty = parseInt(tr.find('#qty').val());
                let price = parseInt(tr.find('#price').text());
                qty = qty + 1;
                tr.find('#qty').val(qty);
                let total = parseInt(price * qty);
                tr.find('#total').text(total);
                // for subtoal
                calculate();
            })
            //    minusBtn
            $('.minusBtn').click(function() {
                let tr = $(this).parents('tr');
                let qty = parseInt(tr.find('#qty').val());
                let price = parseInt(tr.find('#price').text());
                if (qty > 1) {
                    qty = qty - 1;
                    tr.find('#qty').val(qty);
                    let total = parseInt(price * qty);
                    tr.find('#total').text(total);
                    // for calculate
                    calculate();
                }
            })
            // for delete btn
            $('.deleteBtn').click(function() {
                let tr = $(this).parents('tr');
                let cartId = parseInt(tr.find('#cartId').val());
                let productId = parseInt(tr.find('#productId').val());
                // ajax
                $.ajax({
                    type: 'post',
                    url: '/deleteCart',
                    data: {
                        'cartId': cartId,
                        'productId': productId
                    },
                    dataType: 'json'
                });
                tr.remove();
                calculate();
            })
            // for ordrBtn
            $('#orderBtn').click(function() {
               let orderList=[];
               let orderNumber = Math.floor(Math.random()*100000);
               $('tr').each(function(index,row){
                orderList.push({
                    'productId':parseInt($(row).find('#productId').val()),
                    'orderNumber':'phoenix'+orderNumber,
                    'qty':parseInt($(row).find('#qty').val()),
                    'total':parseInt($(row).find('#total').text())
                })
               })
            //    ajax
            $.ajax({
                type:'post',
                url:'/orderBtn',
                data:Object.assign({},orderList),
                dataType:'json',
                success:function(response){
                    window.location.href="http://localhost:8000/";
                }
            });
            })
            // for subtotal calculate
            function calculate() {
                let subtotal = 0;
                $('tr').each(function(index, row) {
                    subtotal += parseInt($(row).find('#total').text());
                })
                $('#subtotal').text(subtotal);
                $('#totalPrice').text(subtotal + 50);
            }
        });
    </script>
@endsection
