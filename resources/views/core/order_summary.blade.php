@extends('core.base')


@section('content')
<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout form</h2>

        <!--Grid row-->
        <div class="row">


            <!--Grid column-->
            <div class="col-md-8 mb-4">

                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>

                <!-- Cart -->
                <ul class="list-group mb-3 z-depth-1">
                    @if ($order)
                    
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
                            <button class="btn btn-danger btn-sm">-</button>
                            <span>{{$o->qty}}</span>
                            <form action="{{route('addCart',['id'=>$o->product->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">+</button>
                            </form>
                        </div>
                        <span class="text-muted">₹{{$o->product->discount_price}} <del>₹{{$o->product->price}}</del></span>
                    </li>

                    @endforeach

                    @else 

                    <h4 class="lead p-4">Sorry Cart is Empty</h4>

                    @endif
                   
                </ul>
                <!-- Cart -->


                <!-- Promo code -->

            </div>

            <div class="col-md-4 mb-4 mt-5">
                <!-- Promo code -->
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
</main>
<!--Main layout-->

@endsection
