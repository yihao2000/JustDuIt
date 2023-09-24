@extends('layout.master')
@section('content')

<style>
    .header1 {
        color: black;
        font-weight: 100;
        text-align: center;
        width: 100%;
    }

    .prodimg{
        width: 15vw;
    }

    .prodname{
        color: #50a4e4;
        font-size: 1em;
    }

    .prodqty{
        font-size: 1em;
    }

    .prodprice{
        font-size: 1em;
    }

    .checkoutdiv{
        width: 100%;
        display: flex;
        justify-content: end;
    }

    @media screen and (max-width: 768px) {
        .viewcartbox{
            margin-top: 25%;
            width: 100vw;
        }

        .prodimg{
            width: 30vw;
        }

        .cartrow{
            margin-top: 10%;
            margin-bottom:10%;
            display: flex;
            flex-direction: column;
            align-content: center;
        }

        .cartcolumn1, .cartcolumn2, .cartcolumn3, .cartcolumn4{
            margin-left: 30%;
        }

        .cartcolumn1, .cartcolumn2, .cartcolumn3, .cartcolumn4, .cartcolumn5{
            float: none;
            align-items: center;
            width: 100vw;
        }

        .cartitembutton{
            width: 100vw;
            border-radius: 0px;
            font-size: 1rem;
        }

        .checkoutbutton{
            width: 100vw;
            border-radius: 0px;
            font-size: 1.5rem;
            height: 10vh;
        }
    }

</style>

<div class="viewcartbox">
    <div class="viewcartheader">
        <h2 class="header1">View Cart</h2>
    </div>

@foreach ($carts as $cart)
    <div class="cartrow">
        <div class="cartcolumn1">
            <img src="{{ asset('assets/' . $cart->product->image) }}" alt="" class="prodimg">
        </div>

        <div class="cartcolumn2">
            <span class="prodname">{{$cart->product->name}}</span>
        </div>

        <div class="cartcolumn3">
            <span class="prodqty">{{$cart->quantity}}</span>
        </div>

        <div class="cartcolumn4">
            <span class="prodprice">Rp {{number_format($cart->quantity*$cart->product->price)}}</span>
        </div>

        <div class="cartcolumn5">
            <a href="editcart/{{$cart->product->id}}">
            <button class="cartitembutton">
                Edit
            </button>
            </a>

        </div>
    </div>
@endforeach

@if(count($carts) <= 0)
        <h2 class="header1">Your cart is empty</h2>
@else
    <div class="checkoutdiv">
        <a href="/checkout">
        <button class="checkoutbutton">
            Checkout
        </button>
        </a>
    </div>
@endif


</div>

@endsection
