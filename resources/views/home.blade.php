@extends('layout.master')
@section('content')

<style>
    .shoescontent {
        margin-top: 10%;
        width: 90vw;
    }

    .shoescontentheader {
        width: 100%;
        height: 50px;
        background:#50a4e4;
        display:flex;
        justify-content: center;
        align-items: center;
    }

    .headertext {
        color: black;
        font-weight: 100;
    }

    .cards_container{
        width:100%;
    }

    .cards{
        max-width:27.8vw;
        background: #ffffff;
        float:left;
        padding: 2vh;
    }

    .prodimg{
        width: 30vw;
        height: 30vh;
        object-fit: cover;
        float: left;
    }

    .detaillink{
        text-decoration: none;
    }

    .prodname{
        color: #59bfff;
        font-weight: 150;
        padding: 10px;
    }

    @media screen and (max-width: 768px) {
        .home_container{
            margin-top: 25%;
        }

        .prodimg{
            width: 100vw;
            height: 50%;
        }

        .shoescontent {
            margin-top: 0%;
            width: 100vw;
        }

        .shoescontentheader {
            width: 100vw;
            height: 10vh;
            background:#50a4e4;
            display:flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>

<div class="home_container">

<div class="shoescontent">
    <div class="shoescontentheader">
            <h2 class="headertext">View Shoes</h2>
    </div>

    <div class="cards_container">
        @foreach ($products as $product)
        <div class="cards">
            <div class="cards_image">
                <img src="{{ asset('assets/' . $product->image) }}" alt="" class="prodimg">
            </div>

            <div class="cards_detail">
                <a class ="detaillink" href="{{ url('productdetail', ['idproduct' => $product->id]) }}"><h4 class="prodname">{{$product->name}}</h4></a>
                <p>Rp{{ number_format($product->price) }}</p>

            </div>


        </div>
        @endforeach


    </div>

</div>

</div>

<center>
    <div class="paginator">
    {{ $products->links() }}
    </div>
</center>


@endsection
