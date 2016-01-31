@extends('layouts.admin')
@section('content')
    @if(Session::has('message'))

        @include('front.partials.flash')
    @else
    @endif

        <?php $memoCommand='';
        $total=0?>
        @forelse($history as $key => $item)
        <?php if($memoCommand != $item->command_at) : ?>
             <table class="table_histories" style="background-color: white; border-color: whitesmoke;">
                 <tr id="table_history_items grid-3">
                     <span class="date_command fl mas">{{trans('app.Date')}} : {{$item->command_at->format('Y m d H:m:s')}}</span>
                     <span class="customer_name fl mas" > {{trans('app.NameCustomer')}} : {{$item->customer->user->name}}</span>
                     <span class="status fl mas">{{trans('app.Status')}} : {{$item->status}}</span>
                    <strong> <span class="total_command fr mas" >{{trans('app.TotalCommand')}} :  <?php echo $totalcommand[strval($item->command_at)] ?> € </span>
                     </strong>
                 </tr>

                 <tr >
                     <th>{{trans('app.ProductName')}}</th>
                     <th>{{trans('app.Price')}}</th>
                     <th>{{trans('app.Quantity')}}</th>
                     <th>{{trans('app.Total')}}</th>

                 </tr>

                 <?php $memoCommand = $item->command_at ?>
                 <?php endif ?> <tr>
                 <th>{{$item->product->name}}</th>
                 <th>{{$item->price}} € </th>
                 <th>{{$item->quantity}}</th>
                 <th>{{$item->totalLine()}} € </th>
                 </tr>@empty

                 @endforelse


             </table><br>
         </tr>
     </table>


@stop