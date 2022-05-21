<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Post;
use App\Models\Photo;
use App\Models\User;
use App\Models\EBook;

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
        $books = EBook::where([['department_id' , auth()->user()->department_id], ['year_id', auth()->user()->year_id]])->get();

        return view('front.books', compact('books'));
    }
}
