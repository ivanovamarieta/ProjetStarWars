@extends('layouts.master')
@section('content')

    <div id="product_show" class="grid-2-1 bfc"></div>
    <div>
        @if($picture=$product->picture)
            <figure id="show_product" class="fl">
                <img class="img_big" src="{{url('uploads',$picture->uri)}}">
            </figure>
        @endif
    </div>

        <div id="select_product">
            <h2 class="name"><a href="{{url('prod', $product->id)}}">{{$product->name}}</a></h2>
            <p class="abstract"> {{$product->abstract}}</p>
            <p class="category">
                @if($cat=$product->category)
                    {{trans('app.Category')}}:{{$cat->title}}
                @endif </p>

            <p class="price">{{trans('app.Price')}}:{{$product->price}}</p>
            <p class="published_at">{{trans('app.DatePublished')}}:{{$product->published_at->format('d m Y')}}</p>
            <p class="tags"> {{trans('app.Tag')}}
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
    </div>

@stop