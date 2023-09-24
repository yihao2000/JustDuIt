@extends('layout.master')
@section('content')

<style>
    .buyproductboxcart{
        margin-top: 10%;
    }

    .buyproductboxheader{
        width: 100%;
        height: 50px;
    }

    .qtyinput{
        width: 7vw;
        margin-left: 1vw;
        font-size: 1em;
    }

    @media screen and (max-width: 768px) {
        .buyproductboxcart{
            margin-top: 25%;
            width: 100vw;
        }

        .qtyinput{
            width: 50vw;
            margin-left: 1vw;
            font-size: 1em;
        }

        .addtocartbutton{
            width: 100vw;
            border-radius: 0px;
            margin-top: 10%;
            font-size: 1rem;
        }

        .qtytext{
            width: 50vw;
            text-align: right;
        }
    }
</style>


<div class="buyproductboxcart" style="">
    <div class="buyproductboxheader">
        <h3>Add To Cart</h3>
    </div>

    <div class="addtocartimage">
        <img src="{{ asset('assets/' . $product->image) }}" alt="" style="width: 15vw;">

    </div>

    <div class="addtocartinformation">
        <h2 style="padding: 3vh;padding-bottom: 0; margin-top: 0px; font-weight: 100; font-size: 1.5em">{{$product->name}}</h2>
        <h4 style="padding-left: 3vh">Rp{{ number_format($product->price) }}</h4>
        <p style="padding-left: 3vh; max-width: 27vw;">{{$product->description}}</p>
    </div>

    <div class="addtocartfield" style="">
    <form action="/addtocart" method="POST">
        @csrf
        <!-- Input ini buat passing ID nya biar bisa diterima -->
        <input type="hidden" name="productid" value="{{ $product->id }}">
            <label for="quantity" class="qtytext">Quantity  </label>
            <input type="number" value="1" name="quantity">
        <button type="submit" class="addtocartbutton" style="">Add To Cart</a>
    </form>

    </div>
    @if ($errors->any())
                    <div style="width:100%; display:flex;align-items: center; padding-left: 3vh " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
                @endif
</div>

@endsection
