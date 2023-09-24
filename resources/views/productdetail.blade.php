@extends('layout.master')
@section('content')
<style>
    h3{
        font-size: 1.5em;
        max-width:15vw;
        font-weight: 100;
        display: block;
        margin-bottom: 0px;
        margin-top: 0px;
    }

    .header2 {
        font-weight: 100;
        padding-top: 1vh;
        margin-top: 1vh;
        margin-bottom: 0px;
        margin-top: 0px
    }

    p{
        max-width: 30vw;
        margin-top: 0px;
        margin-bottom: 1vh;
    }

    span{
        font-weight: bold;
    }

    .shoesinfo {
        float: left;
        margin-left: 1vw;
    }

    .prodimg {
        height: 30vh;
        width: 20vw;
    }

    .registerButton{
        text-decoration: none;
    }

    .btns{
            margin-top: 10%;
    }

    @media screen and (max-width: 768px) {
        .shoesinfo {
            float: left;
            margin: 0;
        }
        .prodimg {
            width: 100vw;
            height: auto;
        }
        .shoesinfo{
            float: unset;
            width: 100vw;
            max-width: 100vw;
        }

        h3{
            font-size: 1.5em;
            max-width: 100vw;
            font-weight: 100;
            display: block;
            margin-bottom: 0px;
            margin-top: 0px;
            text-align: center;
        }

        p{
            max-width: 100vw;
            margin-bottom: 1vh;
            text-align: center;
        }

        .registerButton{
            border-radius: 0px;
            width: 100vw;
            font-size: 1.5rem;
        }

        .btns{
            display: flex;
            justify-content: center;
            margin-top: 10%;
        }
    }
</style>

<div class="shoesdetailcontainer" style="margin-top: 10%;">
    <div class="shoesdetailimage" style="float: left;">
    <img class="prodimg" src="{{ asset('assets/' . $product->image) }}" alt="">

    </div>

    <div class="shoesinfo">
        <h3><span>Name: </span>{{$product->name}}</h3>
        <h3 class="header2"><span>Price: </span> Rp{{ number_format($product->price) }}</h3>
        <h3 class="header2"><span>Description: </span> </h3>
        <p>{{$product->description}}</p>

        <div class="btns">
        @if(Auth::check())
            @if(Auth::User()->role->name == 'Member')
                <a href="/addtocartpage/{{$product->id}}" class="registerButton"><span style="color:#fff">Add to Cart</span></a>
            @elseif(Auth::User()->role->name == 'Admin')
                <a href="/editproductpage/{{$product->id}}" class="registerButton"><span style="color:#fff ">Update Shoe</span></a>
            @endif
        @endif
        </div>
    </div>
</div>

@endsection
