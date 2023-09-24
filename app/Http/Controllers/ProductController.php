<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showHomePage(){
        $products = Product::orderByDesc('id')->paginate(6);
        return view('home')->with('products', $products);
   }

   public function showProductDetail($id){
        $product = Product::find($id);
        return view('productdetail')->with('product', $product);
   }

   public function showAddProductPage(){
     return view('addproduct');

   }

   public function showAddProductToCartPage($id){
    $product = Product::find($id);
    return view('addtocart')->with('product', $product);
   }

   public function addProduct(Request $req){
     $this->validate($req, [
          'shoesname' => 'required',
          'shoesprice' => 'required|gte:100',
          'shoesdescription' => 'required',
          'image' => 'required|image'
      ]);

      
      $file = $req->file('image');
      $filename = $req->shoesname . '.' . $file->extension();
      $uploadDirectory = 'assets';
      $file->move($uploadDirectory, $filename);

      Product::create([
          'name' => $req->shoesname,
          'description' => $req->shoesdescription,
          'price' => $req->shoesprice,
          'image' => $filename,
      ]);

      return redirect('home');

   }

   public function showEditProductPage($id){
     $product = Product::find($id);
     return view('editproduct')->with('product', $product);

   }

   public function editProductDetail(Request $req){

    $this->validate($req, [
      'shoesname' => 'required',
      'shoesprice' => 'required',
      'shoesdescription' => 'required',
  ]);

  if ($req->hasFile('image')) {

    $this->validate($req, [
      'image' => 'image'
  ]);
      $file = $req->file('image');
      $filename = $req->name . '.' . $file->extension();
      $destination = 'assets';
      $file->move($destination, $filename);

      Product::where('id', '=', $req->productid)->update([
          'name' => $req->shoesname,
          'price' => $req->shoesprice,
          'description' => $req->shoesdescription,
          'image' => $filename,
      ]);
  } else {
      Product::where('id', '=', $req->productid)->update([
          'name' => $req->shoesname,
          'price' => $req->shoesprice,
          'description' => $req->shoesdescription
         
      ]);
  }

  return redirect('home');


   }

   public function filterProduct(Request $req){
      $products = Product::where('name', 'like', "%" . $req->keyword . "%")->paginate(6);
        return view('home')->with('products', $products);
   }

   
}
