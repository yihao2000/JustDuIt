@extends('layout.master')
@section('content')

<style>
    .editproductboxcart{
        margin-top: 10%;
    }

    @media screen and (max-width: 768px) {
        .editproductboxcart{
            margin-top: 15%;
            width: 100vw;
        }

        .editcartbutton{
            width: 60vw;
            border-radius: 0px;
            margin-top: 5%;
            font-size: 1rem;
        }
    }
</style>

<div class="editproductboxcart" style="">
    <div class="editcartimage">
        <img src="{{ asset('assets/' . $cart->product->image) }}" alt="" style="width: 15vw;">

    </div>

    <div class="editcartinformation">
        <h2 style="padding: 3vh;padding-bottom: 0; margin-top: 0px; font-weight: 100; font-size: 1.5em">{{$cart->product->name}}</h2>
        <h4 style="padding-left: 3vh">Rp{{ number_format($cart->product->price) }}</h4>
        <p style="padding-left: 3vh; max-width: 27vw;">{{$cart->product->description}}</p>
        <form action="/editcart" method="POST" style="float:left">
        @csrf
        <!-- Input ini buat passing ID nya biar bisa diterima -->
        <input type="hidden" name="productid" value="{{ $cart->product->id }}">

            <label for="quantity" style="padding-left: 1.5vw;">Quantity  </label>
                <input type="number" class="" value="{{$cart->quantity}}" name="quantity" style="width: 7vw; margin-left: 1vw; font-size: 1em;">


                <button type="submit" class="editcartbutton" style="">Update Cart</a>

    </form>
    <a href="/deletecart/{{$cart->product->id}}"><button class="editcartbutton" style="background: red;">Delete</button></a>
    </div>

    @if ($errors->any())
                    <div style="width:100%; display:flex;align-items: center; padding-left: 3vh " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
                @endif
</div>
@endsection
