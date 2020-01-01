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
    	$cart = new Cart($oldCart);
    	$cart->add($product);
    	$request->session()->put('cart',$cart);
    	return redirect('/');
    }
    public function viewCart(){
        if(!Session::has('cart')){
            return view('viewCart');
        }
        $cart = Session::get('cart'); 
        return view('viewCart',['value' => $cart->items]);
    }
    public function editCart(Request $request){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if($request->event == 'update'){
            $product = ['id'=>$request->id,'name'=>$request->name,'price'=>$request->price,'qty'=>$request->qty];
            $cart->add($product);
        }
        if($request->event == 'delete'){
            $cart->delete($request->id);
        }
        $request->session()->put('cart',$cart);    
        return redirect('/view-cart');
    }
}
