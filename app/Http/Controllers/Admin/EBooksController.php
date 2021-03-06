<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EbookRequest;
use App\Models\Department;
use App\Models\EBook;
use App\Models\EBookLog;
use App\Models\Year;
use Illuminate\Support\Facades\Storage;

class EBooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = EBook::whereStaffId(auth()->guard('admin')->id())->with('department:id,name')->paginate(10);

        return view('admin.e_books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('collage_id', auth()->guard('admin')->user()->collage_id)->get(['id', 'name']);
        $years = Year::active()->get(['id', 'name']);

        return view('admin.e_books.create', compact('departments', 'years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EbookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EbookRequest $request)
    {
        $eBook = EBook::create($request->input() + [
                'path' => $request->file('book')->store('e_books', 'public'),
                'collage_id' => auth()->guard('admin')->user()->collage_id,
                'staff_id' => auth()->guard('admin')->id(),
            ]);
        if ($eBook) {
            EBookLog::create(['title' => 'تم اضافة الكتاب', 'e_book_id' => $eBook->id,
                'created_by' => auth()->guard('admin')->id(), 'role' => 'staff']);
        }

        return redirect()->route('admin.e_books.show', $eBook->id)->with('success', 'تم اضافة الكتاب الرجاء تاكيد مراجعته');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function show(EBook $eBook)
    {
        if ($eBook->staff_id == auth()->guard('admin')->id() && !$eBook->approved) {
            return view('admin.e_books.show', compact('eBook'));
        } else {
            return redirect()->back()->withErrors('عذرا انت لاتمتلك صلاحية الوصول !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function edit(EBook $eBook)
    {
        if ($eBook->staff_id == auth()->guard('admin')->id() && !$eBook->approved) {
            $departments = Department::where('collage_id', auth()->guard('admin')->user()->collage_id)
                                     ->get(['id', 'name']);
            $years = Year::active()->get(['id', 'name']);

            return view('admin.e_books.edit', compact('departments', 'years', 'eBook'));
        } else {
            return redirect()->back()->withErrors('عذرا انت لاتمتلك صلاحية الوصول !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EbookRequest $request
     * @param \App\Models\EBook $eBook
     * @return \Illuminate\Http\Response
     */
    public function update(EbookRequest $request, EBook $eBook)
    {
        if ($request->hasFile('book')) {
            Storage::disk('public')->delete($eBook->path);
            $eBook->update($request->input() + [
                    'path' => $request->file('book')->store('e_books', 'public')
                ]);

            return redirect()->route('admin.e_books.show', $eBook->id)->with('success', 'تم التعديل بنجاح');
        } else {
            $eBook->update($request->input());

            return redirect()->route('admin.e_books.show', $eBook->id)->with('success', 'تم التعديل بنجاح');
        }
    }

    public function approved(EBook $eBook)
    {
        if ($eBook->staff_id == auth()->guard('admin')->id()) {
            if (!$eBook->approved) {
                $eBook->update(['approved' => true]);
                EBookLog::create(['title' => 'تم تأكيد مراجعة الكتاب', 'e_book_id' => $eBook->id,
                    'created_by' => auth()->guard('admin')->id(), 'role' => 'staff']);
                return redirect()->route('admin.e_books.index')->with('success', 'تم مراجعة واضافة الكتاب بنجاح');
            } else {
                return redirect()->back()->withErrors('هذا الكتاب تمت مراجعته من قبل !');
            }
        } else {
            return redirect()->back()->withErrors('عذرا انت لاتمتلك صلاحية الوصول !');
        }
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
