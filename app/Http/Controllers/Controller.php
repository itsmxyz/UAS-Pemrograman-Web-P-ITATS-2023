<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
   public function index(){
       if (Auth('schale')->check() || Auth('sensei')->check() || Auth('sekretaris')->check()) {
           if (Auth('schale')->check())
               $data = ['username' => Auth('schale')->user()->username];
           elseif (Auth('sensei')->check())
               $data = ['username' => Auth('sensei')->user()->username];
           elseif (Auth('sekretaris')->check())
               $data = ['username' => Auth('sekretaris')->user()->username];

           return view('page1-home.home', $data);
       }
       else
           return view('page1-home.home');
   }
}
