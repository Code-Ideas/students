<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EBook;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = EBook::approved()->with(['department:id,name', 'collage:id,name'])->paginate(15);

        return view('admin.books.index', compact('books'));
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
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function show(EBook $eBook)
    {
        return view('admin.books.show', compact('eBook'));
    }

    public function returned(EBook $eBook)
    {
        $eBook->update(['approved' => false]);

        return redirect()->route('admin.books.index')->with('success', 'تم تأكيد ارجاع الكتاب');
    }

    public function published(EBook $eBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function edit(EBook $eBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EBook $eBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(EBook $eBook)
    {
        //
    }
}
