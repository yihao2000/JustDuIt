@extends('layout.master')
@section('content')

<style>
    .header{
        color: black;
        font-weight: 100;
    }

    .viewtransactionheader {
        width: 100%;
        height:50px;
        background:#50a4e4;
        display:flex;
        justify-content: center;
        align-items: center;
    }

    @media screen and (max-width: 768px) {
        .viewtransactionheader {
            width: 100vw;
            height: 10vh;
            background:#50a4e4;
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .transactionbox{
            margin-top:10%;
            margin-bottom:10%;
        }

        .viewtransactionbox{
            height: auto;
            width:  100vw;
            margin: 0 auto;
            margin-top: 25%;
        }

        .transactioninformation{
            flex-direction: column;
        }

        .transactiontotal{
            width: 100%;
            justify-content: center;
        }
    }
</style>


<div class="viewtransactionbox">
    <div class="viewtransactionheader">
        <h2 class="header">View All Transaction</h2>
    </div>


   @foreach($headers as $header)
   <div class="transactionbox">
        <div class="transactioninformation">
           <div class="transactiondate">
                <h4 class="cartdetailtext">{{$header->transaction_date}}</h4>
           </div>

           @foreach($header->details as $detail)
            <?php $total = 0;
            $total += $detail->product->price * $detail->quantity; ?>
           @endforeach
           <div class="transactiontotal">
                <h4 class="cartdetailtext">Total Rp {{number_format($total)}}</h4>
           </div>



        </div>
        <div class="transactionimages" style="width: 70%; align-self: center">
        @foreach($header->details as $detail)
            <img src="{{ asset('assets/' . $detail->product->image) }}" alt="" style="width: 30%">

        @endforeach
        </div>
   </div>

   @endforeach



</div>

@endsection
