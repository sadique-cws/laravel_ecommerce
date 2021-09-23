@extends('core.base')


@section('content')
<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">My Orders</h2>

        <!--Grid row-->
        <div class="row">


            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Orders</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>

                <!-- Cart -->
                @foreach($order as $order)
                <div class="card mb-3">
                    <div class="card-header">
                        <span>Order_id: {{$order->id}}</span>
                    </div>
                    <div class="card-body py-0">
                <ul class="list-group mb-3 z-depth-1">

                @php
                    $total_amount = 0;
                    $total_payable_amount = 0;
                    $total_actual_amount = 0;
                    $tax = 0;
                @endphp
                    @if (count($order->orderitem) > 0)

                   @foreach ($order->orderitem as $o)


                    <li class="list-group-item row d-flex justify-content-between lh-condensed">
                        <div class="col-1">
                            <img src="{{asset("products/".$o->product->img1)}}" alt="" class="w-100">
                        </div>
                        <div class="col">
                            <h6 class="my-0">{{$o->product->title}}</h6>
                            <small class="text-muted">{{$o->product->category->cat_title}}</small>
                        </div>
                        <div class="col d-flex">
                             <span>Quantity: {{$o->qty}}</span>
                           </div>
                        @php

                        $total_amount += $o->product->discount_price * $o->qty;
                        $total_actual_amount += $o->product->price * $o->qty;
                        $tax = $total_amount*0.18;
                        $total_payable_amount = $total_amount + $tax;
                        if($order->coupon_id){
                            $total_payable_amount = $total_amount + $tax;
                            $total_payable_amount -= $order->coupon->amount;

                        }
                        @endphp
                        <span class="text-muted">₹{{$o->product->discount_price * $o->qty }} <del>₹{{$o->product->price * $o->qty}}</del></span>

                    </li>

                    @endforeach

                    @else

                    <h4 class="lead p-4">Sorry orders is Empty</h4>

                    @endif

                </ul>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
                <!-- Cart -->
                @endforeach


                <!-- Promo code -->

            </div>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
</main>
<!--Main layout-->

@endsection
