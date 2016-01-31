@extends('layouts.master')

@section('content')
    @forelse($products as $product)
        <div id="products" class="grid-1-2 bfc">

            @if($picture = $product->picture)
                <figure class="fl figure">
                    <a href="{{url('prod', $product->id)}}"><img class="img_small" width="200"  src="{{url('uploads',$picture->uri)}}" ></a>
                </figure>
            @endif

           <div id="description_product">

           <h2 class="name"><a href="{{url('prod', $product->id)}}">{{$product->name}}</a></h2>

           <p class="abstract">{{trans('app.Abstract')}}: {{$product->abstract}}</p>

           <p class="category">
                @if($cat=$product->category)

                   {{trans('app.Category')}}: {{$cat->title}}
                @endif
            </p>

            <p class="price">{{trans('app.Price')}}: {{$product->price}} € </p>

            <p class="tags"> {{trans('app.tag')}}
                @forelse($product->tags as $tag)
                    {{$tag->name}}
                @empty
                    {{trans('app.noTag')}}
                @endforelse
            </p>
            <p class="published_at">{{trans('app.DatePublished')}}: {{$product->published_at->format('d m Y')}}</p>
         </div>
        </div>
    @empty
        <p>No product</p>
    @endforelse
    {!! $products->links() !!}
@stop