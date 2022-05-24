<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CollageRequest;
use App\Models\Collage;
use App\Models\Year;
use Illuminate\Http\Request;

class CollagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $collages = Collage::latest()->paginate(10);

        return view('admin.collages.index', compact('collages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $years = Year::active()->get(['id', 'name']);

        return view('admin.collages.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CollageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CollageRequest $request)
    {
        Collage::create($request->input());

        return redirect()->route('admin.collages.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function show(Collage $collage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function edit(Collage $collage)
    {
        $years = Year::active()->get(['id', 'name']);

        return view('admin.collages.edit', compact('collage', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function update(CollageRequest $request, Collage $collage)
    {
        $collage->update($request->input());

        return redirect()->route('admin.collages.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collage  $collage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collage $collage)
    {
        //
    }
}
