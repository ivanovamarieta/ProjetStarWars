@extends('layouts.master')

@section('content')

@forelse($products as $product)
    <div id="products" class="grid-1-2 bfc">

        @if($pict=$product->picture)

            <figure class="fl figure">
                <a href='{{url('prod',[$product->id,$product->slug])}}'>
                    <img class="img_small" width="260px"  src="{{url('uploads',$pict->uri)}}" >
                    </a>
            </figure>
        @endif

        <div id="description_product">
             <h2 class="name"><a href='{{url('prod',[$product->id,$product->slug])}}'>{{$product->name}}</a></h2><br>

             <p class="abstract">{{trans('app.Description')}}: {{$product->abstract}}</p>

             <p class="category">

        @if($cat=$product->category)

            {{trans('app.Category')}}:
                     <a href="{{url('cat',[$cat->id, str_slug($cat->title)])}}" > {{$cat->title}}</a>
        @endif
            </p>

            <p class="price">{{trans('app.Price')}}: {{$product->price}} €</p>
            <p class="tags"> {{trans('app.Tag')}}
        @forelse($product->tags as $tag)
                    {{$tag->name}}
        @empty
                    {{trans('app.noTag')}}
        @endforelse
            </p>

            <p class="published_at"> {{trans('app.DatePublished')}}: {{$product->published_at->format('d m Y ')}}</p>
        </div>

    </div>
        @empty
            <p>{{trans('app.NoProduct')}}</p>

@endforelse

    {!! $products->links() !!}

@stop




