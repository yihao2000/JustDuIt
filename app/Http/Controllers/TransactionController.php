<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Header;
use App\Models\Cart;
use App\Models\Detail;

class TransactionController extends Controller
{
    //
    public function viewTransactionPage(){
        $user_id = Auth::user()->id;
        $headers = Header::where('user_id', $user_id)->OrderByDesc('id')->get();
        return view('transaction')->with('headers', $headers);
    }

    public function checkout(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        if ($carts->count() > 0) {
            $header = new Header();
            $header->user_id = Auth::id();
            $header->transaction_date = now();
            $header->save();
            $transactionId = $header->id;
            foreach ($carts as $cart) {
                $details = new Detail();
                $details->header_id = $transactionId;
                $details->product_id = $cart->product_id;
                $details->quantity = $cart->quantity;
                $cart->where(['user_id' => Auth::user()->id, 'product_id' => $cart->product_id])->delete();
                $details->save();
            }
        }
        return redirect('home');
    }

    public function showAllTransaction(){
        $headers = Header::get();
        return view('transaction')->with('headers', $headers);
    }
}
