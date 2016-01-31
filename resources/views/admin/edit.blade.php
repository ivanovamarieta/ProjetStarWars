@extends ('layouts.admin')
@section('content')
    @if(Session::has('message'))

        @include('front.partials.flash')
    @else
    @endif

    <form method="POST" action="{{url('product', $product->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="grid-2" id="edit">
        <div class="edit">

                    <div>
                        <label class="label" for="name" id="name" >{{trans('app.name')}}</label><br>
                        <input class="input-text" id="name" type="text" name="name" value="{{$product->name}}" >
                        @if($errors->has('name'))<span class="error">{{$errors->first('name')}}</span>@endif
                    </div>

                    <div>
                        <label class="label" for="slug" id="slug" >{{trans('app.slug')}}</label><br>
                        <input class="input-text" id="slug" type="text" name="slug" value="{{$product->slug}}">
                        @if($errors->has('slug'))<span class="error">{{$errors->first('slug')}}</span>@endif
                    </div>

                    <div>
                        <label class="label" for="tags[]">{{trans('app.Tags')}}</label><br>
                        <select id="tags" name="tags[]" multiple>
                            @foreach($tags as $id=>$name)
                                <option value="{{$id}}" {{$product->hasTag($id)? 'selected':''}}>{{$name}}</option>
                            @endforeach
                        </select>
                     </div>

                    <div>
                        <label class="label" for="abstract" id="abstract">{{trans('app.Abstract')}}</label><br>
                        <textarea row="50" cols="50" class="text-area" name="abstract" id="abstract">{{$product->abstract}}</textarea>
                        @if($errors->has('abstract'))<span class="error">{{$errors->first('abstract')}}</span>@endif
                    </div>

                    <div>
                        <label class="label" for="content" id="content">{{trans('app.content')}}</label><br>
                        <textarea row="50" class="text-area" cols="50" name="content" id="content">{{$product->content}}</textarea>
                        @if($errors->has('content'))<span class="error">{{$errors->first('content')}}</span>@endif
                    </div>



</div>

            <div class="edit">
                <div>
                    <label class="label" for="category_id">{{trans('app.Category')}}</label><br>
                    <select name="category_id" id="select_category">
                        @foreach($categories as $id=>$title)
                            <option value="{{$id}}" {{$product->category_id==$id? 'selected':''}}>{{$title}}</option>
                        @endforeach
                        <option value="0">{{trans('app.noCat')}}</option>
                    </select>
                </div>
                    <div>
                        <label class="label" for="price" id="price" >{{trans('app.Price')}}</label><br>
                        <input class="input-text" id="price"  name="price" value="{{$product->price}}" >
                        @if($errors->has('price'))<span class="error">{{$errors->first('price')}}</span>@endif
                    </div>

                    <div>
                        <label class="label" for="quantity" id="quantity" >{{trans('app.Quantity')}}</label><br>
                        <input class="input-text" id="quantity"  name="quantity" value="{{$product->quantity}}" >
                        @if($errors->has('quantity'))<span class="error">{{$errors->first('quantity')}}</span>@endif
                    </div>

                    <div>
                    <input type="radio" name="published_at" value="true" {{($product->published_at!='0000-00-00 00:00:00')? 'checked':''}}>
                    <label class="label" for="published_at">{{trans('app.PublishedAt')}}</label>
                    </div>


                    <div>
                    <input type="radio" name="status" value="opened" {{($product->status=='opened')? 'checked':''}}>
                    <label class="label" for="status">{{trans('app.opened')}}</label>

                    <input type="radio" name="status" value="closed" {{($product->status=='closed')? 'checked':''}}>
                    <label class="label" for="status" >{{trans('app.closed')}}</label>
                    </div>
                    <div>
                        <h2>{{trans('app.addImage')}}</h2>

                        @if($product->picture)
                            <img src="{{url('uploads',$product->picture->uri)}}" width="100">
                        </div>
                            <div>
                                <input type="radio" name="delete" value="true">
                                <label class="label" for="delete">{{trans('app.Delete')}}</label>
                                <input class="file" type="file"  name="thumbnail"><br>
                        @endif

                    </div>
                        <div>
</div>                     <input type="submit" class="button_select" value="{{trans('app.Update')}}">
</div></div>
    </form>

@stop