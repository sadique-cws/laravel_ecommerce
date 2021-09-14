<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        return view("core.home-page");
    }

    public function cart(){
        return view("core.order-summary");
    }

    public function checkout(){
        return view("core.checkout-page");
    }

    public function product_view(){
        return view("core.product-page");
    }

}
