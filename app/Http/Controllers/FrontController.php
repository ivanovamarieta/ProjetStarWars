<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use View;
use Mail;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Cart;
use App\History;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    public function __construct()
    {
        View::composer('layouts.master', function($view){
            $categories=Category::all();
            $view->with(compact('categories'));
        });
    }

    public function index()
    {
        $products=Product::with('tags','category','picture')
            ->online()
            ->orderBy('published_at','DESC')
            ->paginate(10);

        $title="Welcome Home page";

        return view('front.index',compact('products','title'));
    }

    public function showProduct($id,$slug='')
    {
        $product=Product::findOrFail($id);
        $title = "Page product:{$product->name}";
        return view('front.show', compact('product', 'title'));
    }

    public function showProductByCategory($id,$slug=''){
        $category=Category::findOrFail($id);
        $products=$category->products()->with('tags','category','picture')->paginate(10);
        $title="Welcome category page{$category->title}";
        return view('front.category', compact('products','title'));
    }

    public function showMentions(){
        $title="Mentions Légales";
        return view('front.mentions', compact('title'));
    }

    public function showContact(){
        $title="Page Contact";
        return view('front.contact',compact('title'));
    }

     public function storeContact(Request $request)
  {
      $this->validate($request, [
          'email'=>'required|email',
          'content'=>'required|max:255'
      ]);

      $content=$request->input('content');
      Mail::send('front.contact',compact('content'), function($m) use($request){
          $m->from($request->input('email'),'Client');
          $m->to(env('EMAIL_TECH'),'admin')->subject('Contact e-boutique');
      });

      return back()->with([
          'message'=>trans('app.contactSuccess'),
          'alert'=>'success'
      ]);
  }

    public function commandShow()
    {
        $user=Auth::user();
        $token=Session('_token');
        $products=Cart::where('_token',$token)->get();
        $cartTotal=0;
        foreach($products as $product)
        {
            $cartTotal+=$product->price*$product->quantity;
        }
        return view('front.command',compact('products','cartTotal','user_name'));
    }

    public function storeCommand(){

        $user = Auth::user();
        $token = Session('_token');
        $command = Cart::where('_token',$token)->get();

            foreach($command as $item){
                    $product_id = $item->product_id;
                    $price = $item->price;
                    $quantity = $item->quantity;
                    $customer = $user->customer;

               $history = History::create([
                    'product_id'=>$product_id,
                    'quantity'=>$quantity,
                    'price'=>$price,
                    'customer_id'=>$customer->id,
                    'status'=>'finalized'
                ]);

                $item->delete();
            }

        return redirect('/');
    }

    public function showHistoryAdmin()
    {
        $history = History::all()
        ->sortByDesc('command_at');
        $totalcommand=History::TotalOrder();

        return view('admin.history',compact('history','totalcommand'));
    }
}
