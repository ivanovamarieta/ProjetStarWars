@extends ('layouts.admin')
@section('content')

    <a class="button" href="{{url('product/create')}}">{{trans('app.addProduct')}}</a>

    <table class="prod_table">
        <tr class="table_categories">
            <th>{{trans('app.Status')}}</th>
            <th>{{trans('app.ProductName')}}</th>
            <th>{{trans('app.Price')}}</th>
            <th>{{trans('app.Quantity')}}</th>
            <th>{{trans('app.DatePublishedAt')}}</th>
            <th>{{trans('app.Category')}}</th>
            <th>{{trans('app.Tags')}}</th>
            <th>{{trans('app.Action')}}</th>
        </tr>

    @forelse($products as $product)
        <tr class="table_list_products">

            <th><a class="btn btn-{{$product->status}}" href="{{url('product',['status',$product->id])}}">{{$product->status}}</a></th>
            <th><a href="{{url('product',[$product->id,'edit'])}}">{{$product->name}}</a></th>
            <th>{{$product->price}}</th>
            <th>{{$product->quantity}}</th>
            <th>{{$product->published_at->format('d m Y')}}</th>
            <th>{{($cat=$product->category)? $cat->title: 'non catégorisé'}}</th>
            <th>@forelse($product->tags as $tag)
                    {{$tag->name}}
                @empty
                    {{trans('app.noTag')}}
                @endforelse</th>
            <th>
                <form method="POST" action="{{url('product',$product->id)}}">
                  {{ csrf_field() }}
                 <input type="hidden" name="_method" value="delete">
                 <input class="button_delete" type="submit" value="delete">
                </form>
            </th>
         </tr>
    @empty
    @endforelse
    </table>
@stop