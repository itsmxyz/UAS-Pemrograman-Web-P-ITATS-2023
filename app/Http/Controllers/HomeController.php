<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public final function index(){
        $data = [];
        if (Auth('schale')->check() || Auth('sensei')->check() || Auth('sekretaris')->check()) {
            if (Auth('schale')->check())
                $data = ['username' => Auth('schale')->user()->username];
            elseif (Auth('sensei')->check())
                $data = ['username' => Auth('sensei')->user()->username];
            elseif (Auth('sekretaris')->check())
                $data = ['username' => Auth('sekretaris')->user()->username];

            return view('page1-home.home', compact('data'));
        }
        else
            return view('page1-home.home', compact('data'));
    }
}
