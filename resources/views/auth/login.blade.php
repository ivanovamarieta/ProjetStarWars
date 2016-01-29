@extends('layouts.master')
@section('content')

<form method="POST" action="{{url('login')}}">
    {!!csrf_field()!!}

    <div class="form-text">
        <label class="label" for="email"> {{trans('app.emailAddress')}} : </label>
        <input class="input-text" name="email" id="email" type="email" value="{{old('email')}}">
        @if($errors->has('email'))<span class="error">{{$errors->first('email')}}</span>@endif
    </div>

    <div class="form-text">
        <label class="label" for="password">  {{trans('app.Password')}} : </label>
        <input class="password" name="password" id="password" type="text" value="{{old('password')}}">
        @if($errors->has('password'))<span class="error">{{$errors->first('password')}}</span>@endif
    </div>

    <div class="form-text">
        <input  name="remember" type="radio" value="true">
        <label class="label" for="remember">{{trans('app.RememberMe')}}</label>
    </div>

    <div class="form-submit">
         <input type="submit" value="{{trans('app.Login')}}">
    </div>
</form>


@stop