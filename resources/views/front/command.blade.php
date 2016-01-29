@extends('layouts.master')
@section('content')

    @forelse($products as $product)
        <div id="categories" class="bfc">

            <a href="#"> <img src="{{url('uploads',$product->product->picture->uri)}}" width="100"></a>

            <h2><a href="{{url('product',[$product->id,'edit'])}}">{{$product->product->name}}</a></h2>

            <p class="quantity"> {{trans('app.Quantity')}}: {{$quantity=$product->quantity}}</p>

            <p class="price"> {{trans('app.Price')}}: {{$price=$product->price}} €
                <span class="price-product-total"> {{trans('app.PriceTotalProduct')}} : {{$total=$quantity*$price}} € </span>
            </p>
        </div>
    @empty
        <p>{{trans('app.YourCartIsEmpty')}}</p>
    @endforelse

    <p class="">{{trans('app.Total')}}: {{$cartTotal}} € </p>


    <a href="{{url('storeCommand')}}" > <button >{{trans('app.FinishCommand')}}</button></a>




@stop