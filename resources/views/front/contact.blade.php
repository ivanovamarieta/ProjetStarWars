@extends ('layouts.master')
@section('content')
<div id="contact" class="bfc">
    @if(Session::has('message'))

        @include('front.partials.flash')
    @else
        <form method="POST" action="{{url('storeContact')}}">
            {!!csrf_field()!!}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-text">
                    <label class="label" for="email">{{trans('app.emailAddress')}} </label><br>
                    <input class="input-text" name="email" id="email" text="email" value="{{old('email')}}">
                    @if($errors->has('email'))<span class="error">{{$errors->first('email')}}</span>@endif
            </div>

                <div class="content">
                    <label class="label" for="content" >{{trans('app.YourMessage')}} </label><br>
                    <textarea class="text-area" row="50" cols="50" name="content">{{old('content')}}</textarea>
                    @if($errors->has('content'))<span class="error">{{$errors->first('content')}}</span>@endif
                </div>

                <div class="form-submit">
                    <input class="button_select" type="submit" value="{{trans('app.SendMessage')}}">
                 </div>
        </form>
    @endif
</div>
@stop