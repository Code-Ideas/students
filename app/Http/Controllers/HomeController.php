<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Post;
use App\Models\Photo;
use App\Models\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {   
         $services=Service::whereJsonContains('collages', auth()->user()->collage_id)->get();
        $posts=Post::with('photo')->get();


        return view('welcome',compact('services','posts'));
    }
}

