@extends('layouts.master')

@section('content')
    @forelse($products as $product)
       <div id="categories" class="bfc">

            @if($picture = $product->picture)
                <figure class="fl figure">
                    <a href="{{url('product', $product->id)}}"><img class="img_small fl" width="200"  src="{{url('uploads',$picture->uri)}}" ></a>
                </figure>
            @endif

                <h2 class=""><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h2>

            <p class="abstract"> Déscription: {{$product->abstract}}</p>

            <p class="categorie">
                @if($cat=$product->category)

                    Catégorie: {{$cat->title}}
                @endif
            </p>

            <p class="price">Prix: {{$product->price}} € </p>

            <p class="tags"> {{trans('app.tag')}}
                @forelse($product->tags as $tag)
                    {{$tag->name}}
                @empty
                    {{trans('app.noTag')}}
                @endforelse
            </p>

                <p class="published_at">Date de publication: {{$product->published_at->format('d m Y')}}</p>

        </div>
    @empty
        <p>No product</p>
    @endforelse
    {!! $products->links() !!}
@stop