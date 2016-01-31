@extends('layouts.master')
@section('content')
    <div id="cart" class="pam">

    @if(Session::has('message'))

        @include('front.partials.flash')
    @else
    @endif

    @forelse($products as $product)

             <div id="cart_item" class="bfc">
                 <figure id="item" class="fl ">
                 <a  href='#'><img  class="image_item" src="{{url('uploads',$product->product->picture->uri)}}"></a>
                 </figure>
                 <div id="item_description" class="flex-container mas">

                     <h4 class="name_item"><a href="#">{{$product->product->name}}</a></h4>
                     <p class="quantity_item">{{trans('app.Quantity')}}: {{$quantity=$product->quantity}}</p>
                     <p class="price_item">{{trans('app.Price')}}: {{$price=$product->price}} €</p>
                     <p class="price-product-total">{{trans('app.PriceTotalProduct')}} : {{$total=number_format($quantity*$price,2,',','')}} €</p>

                     <form method="POST" action="{{url('cart',$product->id)}}">
                         {{ csrf_field() }}

                         <input type="hidden" name="_method" value="delete">
                         <input class="button_delete" type="submit" value="{{trans('app.Delete')}}">
                     </form>
                 </div>
             </div>
    @empty
                <p>{{trans('app.YourCartIsEmpty')}}</p>
    @endforelse
                <p class="total_cart"> Total de votre panier : {{$cartTotal=number_format($cartTotal,2,',','')}} € </p>

                <a href="{{url('command')}}" > <button class="button_select">{{trans('app.FinishCommand')}}</button></a>
    </div>
@stop

