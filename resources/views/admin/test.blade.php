@extends('layouts.admin')
@section('content')
    <?php $memoCommand='' ?>
    @forelse($history as $key=>$item)
        <?php if($memoCommand!=$item->command_at) : ?>
        <table>
            <tr class="table_histories">
                <th>{{trans('app.Date')}}</th>
                <th>{{trans('app.NameCustomer')}}</th>
                <th>{{trans('app.ProductName')}}</th>
                <th>{{trans('app.Price')}}</th>
                <th>{{trans('app.Quantity')}}</th>
                <th>{{trans('app.Total')}}</th>
                <th>{{trans('app.Status')}}</th>
            </tr>
        </table>

        <?php $memoCommand=$item->command_at ?>
        <?php endif ?>
        <table>
            <th>{{$item->command_at}}</th>
            <th>{{$item->customer->user->name}}</th>
            <th>{{$item->product->name}}</th>
            <th>{{$item->price}}</th>
            <th>{{$item->quantity}}</th>
            <th>{{$item->totalLine()}} </th>
            <th>{{$item->status}}</th>
        </table>
    @empty
    @endforelse
@stop