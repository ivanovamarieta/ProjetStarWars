@extends('layouts.master')
@section('content')
    @if(Session::has('message'))

        @include('front.partials.flash')
    @else
    @endif
    
    @forelse($products as $product)

             <div id="categories" class="bfc">

              <a href="#"> <img src="{{url('uploads',$product->product->picture->uri)}}" width="100"></a>

              <h2><a href="{{url('product',[$product->id,'edit'])}}">{{$product->product->name}}</a></h2>

              <p class="quantity"> {{trans('app.Quantity')}}: {{$quantity=$product->quantity}}</p>

              <p class="price"> {{trans('app.Price')}}: {{$price=$product->price}} €  <span class="price-product-total"> {{trans('app.PriceTotalProduct')}} : {{$total=$quantity*$price}} € </span> </p>

                <form method="POST" action="{{url('cart',$product->id)}}">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="delete">
                <input class="button_delete" type="submit" value="{{trans('app.Delete')}}">
                </form>
                </div>
    @empty
                <p>{{trans('app.YourCartIsEmpty')}}</p>
    @endforelse

                 <p class="total">{{$cartTotal}}</p>

                 <a href="{{url('command')}}" > <button >{{trans('app.FinishCommand')}}</button></a>

@stop
