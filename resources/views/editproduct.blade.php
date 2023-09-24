@extends('layout.master')
@section('content')

<style>
    .editproductboxcart{
        margin-top: 10%;
    }

    .editproductboxheader{
        width: 100%;
        height:50px;
    }

    @media screen and (max-width: 768px) {
        .editproductboxcart{
            margin-top: 25%;
            width: 100vw;
        }

        .registerButton{
            width: 100vw;
            border-radius: 0px;
            margin: 0;
            font-size: 1rem;
        }
    }
</style>

<div class="editproductboxcart">
    <div class="editproductboxheader">
        <h3>Edit Shoe</h3>
    </div>

    <div class="editproductimage">
        <img src="{{ asset('assets/' . $product->image) }}" alt="" style="width: 15vw;">

    </div>

    <div class="editproductinformation">
        <h2 style="padding: 3vh;padding-bottom: 0; margin-top: 0px; font-weight: 100; font-size: 1.5em">{{$product->name}}</h2>
        <h4 style="padding-left: 3vh">Rp{{ number_format($product->price) }}</h4>
        <p style="padding-left: 3vh; max-width: 27vw;">{{$product->description}}</p>
    </div>

    <div class="editproductfield" style="">


    <form action="/editproductdetail" method="post" class="formeditshoes" enctype="multipart/form-data">
        @csrf

    <!-- Input ini buat passing ID nya biar bisa diterima -->
    <input type="hidden" name="productid" value="{{ $product->id }}">

    <label for="name" class="shoesinfolabel"><b>Shoes Name</b></label>
    <input type="text" name="shoesname" class="shoeseditfield">
    <br>

    <label for="psw" class="shoesinfolabel"><b>Price</b></label>
    <input type="number"  name="shoesprice" class="shoeseditfield">
    <br>

    <label for="description" class="shoesinfolabel"><b>Description</b></label>
    <input type="text" name="shoesdescription" class="shoeseditfield">
    <br>


    <input type="file" name="image" style="height:50px; margin-top: 1.5vh;">
    </label>

                @if ($errors->any())
                    <div style="width:100%; display:flex;justify-content: center;align-items: center; " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
                @endif


    <button type="submit" class="registerButton">Save Product</button>


</form>


    </div>
    @if ($errors->any())
                    <div style="width:100%; display:flex;align-items: center; padding-left: 3vh " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
    @endif
</div>


@endsection
