<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function addToCart(Request $req){
        
         //Minimal 1 product yg bisa di add di cart
         $this->validate($req, [
            'quantity' => 'required|gt:0'
        ]);

        $cart  = Cart::where(['user_id' => Auth::user()->id, 'product_id' => $req->productid])->first();
        if ($cart == null) {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $req->productid,
                'quantity' => $req->quantity
            ]);
        } else {
            $addQuantity = $cart->quantity + $req->quantity;
            Cart::where(['user_id' => Auth::user()->id, 'product_id' => $req->productid])->update([
                'quantity' => $addQuantity
            ]);
        }

        return redirect('home');
    }

    public function showCartPage(){
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->OrderByDesc('updated_at')->get();
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += ($cart->quantity * $cart->product->price);
        }
        $totalQuantity = Cart::where('user_id', $user_id)->sum('quantity');
        return view('cart')->with('carts', $carts)->with('totalPrice', $totalPrice)->with('totalQuantity', $totalQuantity);
    }

    public function showEditCartPage($id){

        $user_id = Auth::user()->id;
        $cart = Cart::where([
            'product_id' => $id,
            'user_id' => $user_id
        ])->first();

      
        return view('editcart', compact('cart'));
    }


    public function editCart(Request $req){
        $this->validate($req, [
            'quantity' => 'required|gt:0'
        ]);

        $user_id = Auth::user()->id;
        Cart::where([
            'product_id' => $req->productid,
            'user_id' => $user_id
        ])->update([
            'quantity' => $req->quantity
        ]);

        return redirect('cart');

    }

    public function deleteCart($id){
        Cart::where(['user_id' => Auth::user()->id, 'product_id' => $id])->delete();
        return redirect('cart');
       }
    
}
