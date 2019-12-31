<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Validator, View, Session, Redirect};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @ return \Illuminate\Contracts\Support\Renderable
     * @return RedirectResponse
     */
    public function index()
    {
        Session::flash('message', 'You are logged in!');
        return Redirect::to('tasks');
//        return view('home');
    }
}
