@extends('layouts.admin')
@section('content')

        <?php $memoCommand='';
        $total=0?>
        @forelse($history as $key => $item)
        <?php if($memoCommand != $item->command_at) : ?>
             <table class="table_histories">
                 <tr id="table_history_items">
                     {{trans('app.Date')}} : {{$item->command_at->format('Y m d H:m:s')}} |
                     {{trans('app.NameCustomer')}} : {{$item->customer->user->name}}
                     {{trans('app.TotalCommand')}} :  <?php echo $totalcommand[strval($item->command_at)] ?> €
                 </tr>

                 <tr>
                     <th>{{trans('app.ProductName')}}</th>
                     <th>{{trans('app.Price')}}</th>
                     <th>{{trans('app.Quantity')}}</th>
                     <th>{{trans('app.Total')}}</th>
                     <th>{{trans('app.Status')}}</th>
                 </tr>

                 <?php $memoCommand = $item->command_at ?>
                 <?php endif ?> <tr>
                 <th>{{$item->product->name}}</th>
                 <th>{{$item->price}} € </th>
                 <th>{{$item->quantity}}</th>
                 <th>{{$item->totalLine()}} € </th>
                 <th>{{$item->status}}</th></tr>@empty

                 @endforelse


             </table>
         </tr>
     </table>


@stop