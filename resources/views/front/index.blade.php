@extends('layouts.master')

@section('content')

@forelse($products as $product)
    <div id="categories" class="bfc">

        @if($pict=$product->picture)

            <figure class="fl figure">
            <img class="img_small fl" width="250px"  src="{{url('uploads',$pict->uri)}}" >
                </figure>
        @endif
             <h2 class=""><a href='{{url('prod',[$product->id,$product->slug])}}'>{{$product->name}}</a></h2>

      <p class="abstract"> Description: {{$product->abstract}}</p>

          <p class="categorie">

            @if($cat=$product->category)

       Catégorie: <a href="{{url('cat',[$cat->id, str_slug($cat->title)])}}" > {{$cat->title}}</a>
        @endif
        </p>

            <p class="price">Prix: {{$product->price}} €</p>

            <p class="tags"> {{trans('app.tag')}}
                @forelse($product->tags as $tag)
                    {{$tag->name}}
                    @empty
                    {{trans('app.noTag')}}
                @endforelse
            </p>
            <p class="published_at"> Date de publication: {{$product->published_at->format('d m Y')}}</p>
    </div>
        @empty
           <p>No Product</p>
@endforelse
    {!! $products->links() !!}

@stop




