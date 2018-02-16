<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BackController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $user = Auth::user();
        return view('back.dashboard',compact('user'));
    }
}
