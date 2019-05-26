<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Gate::denies('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        
        return view('user.home');
    }
}
