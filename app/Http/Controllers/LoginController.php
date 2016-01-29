<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use View;
use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function __construct()
    {
        View::composer('layouts.master', function ($view)
        {
            $categories = Category::all();
            $view->with(compact('categories'));
        });
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
                'remember' => 'in:true',
            ]);

            $remember = !empty($request->input('remember'))? true : false;

            if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')], $remember))
            {
               return redirect()->intended('product');

            } else
            {
                return back()->withInput($request->only('email', 'remember'))->with(['message'=>trans('app.noAuth'), 'alert'=>'warning']);
            }
        }
        else
        {
            return view('auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}