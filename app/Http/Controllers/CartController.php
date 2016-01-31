<?php

namespace App\Http\Controllers;
use View;
use Mail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Picture;
use Illuminate\Http\Request;
use App\Cart;
use App\Http\Requests;
use App\Category;


class CartController extends Controller
{
    public function __construct()
    {
        View::composer('layouts.master', function ($view)
        {
            $categories = Category::all();
            $view->with(compact('categories'));
        });
    }

    public function index()
    {
            $token=Session('_token');
            $products=Cart::where('_token',$token)->get();
            $cartTotal=0;
            foreach($products as $product)
            {
                $cartTotal+=$product->price*$product->quantity;
            }
            return view('front.cart',compact('products','cartTotal'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
            $token=Session('_token');
            $product_id = $request->get('product_id');
            $quantity = $request->get('quantity');
            $price=Product::find($product_id)->price;

            Cart::create([

                'product_id'=>$product_id,
                'quantity'=>$quantity,
                '_token'=>$token,
                'price'=>$price,
            ]);

            return redirect('cart')->with(['message'=>'Le produit a été ajouté dans votre panier']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
            $product=Cart::find($id);
            $product->delete();
            return back()->with(['message'=>'Produit effacé']);
    }
}
