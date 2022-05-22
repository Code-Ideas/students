<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ILiterate;
use App\Models\User;
use Illuminate\Http\Request;

class LiteraciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('literacies')->with('collage:id,name')->latest()->paginate(20);

        return view('admin.literacies.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ILiterate  $ILiterate
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.literacies.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ILiterate  $literacy
     * @return \Illuminate\Http\Response
     */
    public function edit(ILiterate $literacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ILiterate  $literacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ILiterate $literacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ILiterate  $literacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(ILiterate $literacy)
    {
        //
    }
}
