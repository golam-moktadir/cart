<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Cart;
use Session;
class ProductController extends Controller
{
    public function index(){
    	$value = Product::all();
    	return view('index',['value'=>$value]);
    }
    public function addToCart(Request $request){

    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
        $product = ['id'=>$request->id,'name'=>$request->name,'price'=>$request->price,'qty'=>$request->qty];
        //print_r($oldCart);exit;     
    	$cart = new Cart($oldCart);
    	$cart->add($product);
    	$request->session()->put('cart',$cart);
    	return redirect('/');
    }
    public function viewCart(){
        $cart = Session::get('cart');//echo "<pre>";
       // print_r($cart->items);exit;     
        return view('viewCart',['value' => $cart->items]);
    }
    public function getanother(){
        Session::forget('cart');
    }
}
