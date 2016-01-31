@extends('layouts.master')
@section('content')

    <div id="command" class="pam">
    @forelse($products as $product)
        <div id="command_item" class="bfc">

                <figure id="item" class="fl ">
                <a href="#"> <img class="fl" src="{{url('uploads',$product->product->picture->uri)}}"></a>
                </figure>
            <div id="item_description" class="flex-container mas">

                <h4 class="name_item"><a href="{{url('product',[$product->id,'edit'])}}">{{$product->product->name}}</a></h4>

                <p class="quantity_item"> {{trans('app.Quantity')}}: {{$quantity=$product->quantity}}</p>

                <p class="price_item"> {{trans('app.Price')}}: {{$price=$product->price}} €
                    <p class="price-product-total"> {{trans('app.PriceTotalProduct')}} : {{$total=number_format($quantity*$price,2,',','')}} € </p>
                </p>
            </div>
        </div>
    @empty
        <p>{{trans('app.YourCartIsEmpty')}}</p>
    @endforelse

    <p class="total_cart">Total de votre commande: {{$cartTotal=number_format($cartTotal,2,',','')}} € </p>

    <a href="{{url('storeCommand')}}" > <button class="button_select" >{{trans('app.FinishCommand')}}</button></a>
</div>
@stop