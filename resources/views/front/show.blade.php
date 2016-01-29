@extends('layouts.master')
@section('content')

    <div class="product clearfix"></div>
    {{$product->abstract}}
    @if($picture=$product->picture)
        <figure class="fl figure">
            <img class="img_big fl" src="{{url('uploads',$picture->uri)}}">
        </figure>

        @endif
    <p class="abstract"> {{$product->abstract}}</p>

    <p class="categorie">
        @if($cat=$product->category)
            Catégorie:{{$cat->title}}
        @endif </p>

    <p class="price">Prix:{{$product->price}}</p>
    <p class="published_at">Date de publication:{{$product->published_at->format('d m Y')}}</p>
    <p class="tags"> {{trans('app.tag')}}
        @forelse($product->tags as $tag)
            {{$tag->name}}
        @empty
            {{trans('app.noTag')}}
        @endforelse
    </p>

    <form method="POST" action="{{url('cart')}}">
     {!!csrf_field()!!}
    <div class="content">
        <label class="label" for="quantity">{{trans('app.selectQuantity')}} </label>
        <select name="quantity" id="quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <input type="submit" class="button_select" value="{{trans('app.select')}}">
    </form>
    </div>

@stop