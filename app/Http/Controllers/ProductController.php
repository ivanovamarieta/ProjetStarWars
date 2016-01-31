<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Picture;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products=product::all();
        return view('admin.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::lists('title','id');
        $tags = Tag::lists('name','id');
        return view('admin.create',compact('tags','categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'abstract'=>'required|max:255',
            'content'=>'max:255',
            'price'=>'required|numeric',
            'quantity'=>'numeric',
            'published_at'=>'in:true',
            'status'  => 'in:opened,closed',
            'thumbnail'=>'image|max:3000' // 3Mo
        ]);

        $product=Product::create($request->all());
        $product->tags()->attach($request->input('tags'));



        if(!is_null($request->file('thumbnail'))){

            $im = $request->file('thumbnail');
            $ext = $im->getClientOriginalExtension();
            $uri=str_random(12).'.'.$ext;
            $im->move(env('UPLOAD_PATH','./uploads'), $uri);

            Picture::create([
                'uri'=>$uri,
                'type'=>$ext,
                'size'=>$im->getClientSize(),
                'product_id'=>$product->id,
                'title'=>$product->name
            ]);
        }

        return redirect('product')->with(['message'=>'success']);
    }

    public function changeStatus($id)
    {
        $product=Product::find($id);

        $product->status=($product->status=='opened')? 'closed':'opened';

        $product->save();

        return back()->with(['message'=>trans('app.changeStatus')]);
    }

    public function show($id)
    {
       return 'view';
    }

    public function edit($id)
    {
        $product=Product::find($id);
        $categories = Category::lists('title','id');
        $tags = Tag::lists('name','id');
        return view ('admin.edit', compact('product','tags','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'abstract'=>'required|max:255',
            'content'=>'max:255',
            'price'=>'required|decimal(7,2)',  //ici
            'quantity'=>'numeric',
            'published_at'=>'in:true',
            'status'  => 'in:opened,closed',
            'thumbnail'=>'image|max:5000' // 3Mo
        ]);

            $product=Product::find($id);

        if(!empty($request->input('tags'))){

            $product->tags()->sync($request->input('tags'));
        }
        else
        {
            $product->tags()->detach();
        }

        if($request->input('delete')=='true'){
            if(!is_null($product->picture)){
                Storage::disk('local')->delete($product->picture->uri);
                $product->picture->delete();
            }
        }

        if(!is_null($request->file('thumbnail'))){

            $im=$request->file('thumbnail');
            $ext = $im->getClientOriginalExtension();
            $uri=str_random(12).'.'.$ext;
            $im->move(env('UPLOAD_PATH','./uploads'), $uri);

            Picture::create([
                'uri'=>$uri,
                'type'=>$ext,
                'size'=>$im->getClientSize(),
                'product_id'=>$product->id,
                'title'=>$product->name
            ]);
        }

        $product->update($request->all());
        return redirect('product')->with(['message'=>'success']);
    }

    public function destroy($id)
    {
        $product=Product::find($id);

        $picture=$product->picture;

        if(!is_null($picture))
        {
            Storage::disk('local')->delete($picture->uri);
            $picture->delete();
        }

        $product->delete();
        return back()->with(['message'=>'Product deleted']);
    }
}

