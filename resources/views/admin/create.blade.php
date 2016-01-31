@extends ('layouts.admin')
@section('content')


    <form method="POST" action="{{url('product')}}" enctype="multipart/form-data">
        {!!csrf_field()!!}

        <div class="grid-2">
            <div>
                <div class="form-text">
                    <label class="label" for="name" id="name" >{{trans('app.name')}}</label>
                    <input class="input-text" id="name" type="text" name="name" value="{{old('name')}}" >
                    @if($errors->has('name'))<span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div class="form-text fl">
                    <label class="label" for="slug" id="slug" >{{trans('app.slug')}}</label>
                    <input class="input-text" id="slug" type="text" name="slug" value="{{old('slug')}}">
                    @if($errors->has('slug'))<span class="error">{{$errors->first('slug')}}</span>@endif
                </div>

                <div class="content">
                    <label class="label" for="tags">{{trans('app.Tags')}}</label>
                    <select id="tags" name="tags[]">
                        @foreach($tags as $id=>$name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                 </div>

                <div class="form-text">
                    <label class="label" for="abstract" id="abstract">{{trans('app.abstract')}}</label><br>
                    <textarea row="50" cols="50" name="abstract" id="abstract">{{old('abstract')}}</textarea>
                    @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span>@endif
                </div>

                <div class="form-text">
                    <label class="label" for="content" id="content">{{trans('app.content')}}</label><br>
                    <textarea row="50" cols="50" name="content" id="content">{{old('content')}}</textarea>
                    @if($errors->has('content'))<span class="error">{{$errors->first('content')}}</span>@endif
                </div>
            </div>

            <div>
                <div class="content" >
                    <label class="label" for="category_id">{{trans('app.Category')}}</label>
                    <select name="category_id">
                        @foreach($categories as $id=>$title)
                            <option value="{{$id}}">{{$title}}</option>
                        @endforeach
                        <option value="0">{{trans('app.noCat')}}</option>
                    </select>
                </div>

                <div class="content">
                    <label class="label" for="price" id="price" >{{trans('app.Price')}}</label>
                    <input class="input-text" id="price"  name="price" value="{{old('price')}}" >
                    @if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span>@endif
                </div>

                <div class="content">
                    <label class="label" for="quantity" id="quantity" >{{trans('app.Quantity')}}</label>
                    <input class="input-text" id="quantity"  name="quantity" value="{{old('quantity')}}" >
                    @if($errors->has('quantity'))<span class="error">{{$errors->first('quantity')}}</span>@endif
                </div>

                <div class="content">
                    <h3>Mettre en ligne un produit:</h3>
                    <input type="radio" name="published_at" value="true">
                    <label class="label" for="published_at">{{trans('app.PublishedAt')}}</label>
                 </div>

                <div class="content">
                    <input type="radio" name="status" value="opened">
                    <label class="label" for="status">{{trans('app.opened')}}</label><br>

                    <input type="radio" name="status" value="closed">
                    <label class="label" for="status">{{trans('app.closed')}}</label>
                </div>

                <div class="input-file">
                       <h2>{{trans('app.addImage')}}</h2>
                       <input class="file" type="file" name="thumbnail" value="{{old('thumbnail')}}">
                       @if($errors->has('thumbnail'))<span class="error">{{$errors->first('thumbnail')}}</span>@endif
                </div>

                <div class="form-submit">
                        <input type="submit" class="button" value="{{trans('app.add')}}">
                </div>
            </div>
        </div>
    </form>

@stop