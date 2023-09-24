@extends('layout.master')
@section('content')

<style>
    .addshoesbox{
        margin-top: 10%;
    }

    .addshoesboxheader{
        width: 100%;
        height:50px;
        background:#50a4e4;
    }

    @media screen and (max-width: 768px) {
        .addshoesbox{
            margin-top: 25%;
            width: 100vw;
        }

        .registerButton{
            width: 100vw;
            border-radius: 0px;
            margin: -4%;
            font-size: 1rem;
        }
    }
</style>

<div class="addshoesbox">
        <div class="addshoesboxheader" style="">
            <h2 style="color: black; font-weight: 100">Add Shoes</h2>
        </div>

    <form action="/addproduct" method="post" class="formaddshoes" enctype="multipart/form-data">
        @csrf

  <div class="container">

    <label for="name"><b>Shoes Name</b></label>
    <input type="text" name="shoesname" class="shoesfield">

    <label for="psw"><b>Price</b></label>
    <input type="number"  name="shoesprice" class="shoesfield">

    <label for="description"><b>Description</b></label>
    <input type="text" name="shoesdescription" class="shoesfield">

    <label for="image" style="">
    <input type="file" name="image" style="height:50px; margin-top: 1.5vh;">
    </label>
                @if ($errors->any())
                    <div style="width:100%; display:flex;justify-content: center;align-items: center; " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
                @endif
    <button type="submit" class="registerButton">Add Product</button>

  </div>


</form>

        </div>
    </div>


@endsection
