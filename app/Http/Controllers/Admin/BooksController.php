<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Collage;
use App\Models\Department;
use App\Models\EBook;
use App\Models\EBookLog;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\Year;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function students()
    {
        $books = EBook::whereNotNull('student_id')->with(['user:id,name', 'collage:id,name'])->paginate(15);

        return view('admin.books.students', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $fileName = pathinfo($request->file('book')->getClientOriginalName(), PATHINFO_FILENAME);
        $book = EBook::create($request->input() + [
                'path' => $request->file('book')->storeAs('e_books', $fileName, 'public'),
                'admin_id' => auth()->guard('admin')->id(),
                'approved' => true, 'published' => true
            ]);
        if ($book) {
            UserNotification::create(['title' => 'الكتب الالكترونية', 'body' => 'تم اضافة كتاب جديد', 'seen_users' => [],
                'model_name' => 'EBook', 'model_id' => $book->id, 'users' => [(int)$book->student_id]]);
        }

        return redirect()->route('admin.books.create')->with('success', 'تم اضافة الكتاب');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EBook  $eBook
     * @return \Illuminate\Http\Response
     */
    public function log(EBook $eBook)
    {
        return view('admin.books.log', compact('eBook'));
    }

    public function returned(EBook $eBook, Request $request)
    {
        $eBook->update(['approved' => false, 'return_reason' => $request->get('return_reason')]);
        EBookLog::create(['title' => 'تم ارجاع الكتاب', 'e_book_id' => $eBook->id,
            'created_by' => auth()->guard('admin')->id(), 'role' => 'admin']);

        return redirect()->route('admin.books.index')->with('success', 'تم تأكيد ارجاع الكتاب');
    }

    public function published(EBook $eBook)
    {
        $eBook->update(['published' => true]);
        EBookLog::create(['title' => 'تم تأكيد نشر الكتاب', 'e_book_id' => $eBook->id,
            'created_by' => auth()->guard('admin')->id(), 'role' => 'admin']);

        return redirect()->route('admin.books.index')->with('success', 'تم تأكيد نشر الكتاب');
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
        $eBook->update(['published' => false]);

        EBookLog::create(['title' => 'تم الغاء نشر الكتاب', 'e_book_id' => $eBook->id,
            'created_by' => auth()->guard('admin')->id(), 'role' => 'admin']);

        return redirect()->back()->with('success', 'تم الغاء النشر');
    }

    public function yearsList($collage_id)
    {
        $collage = Collage::whereId($collage_id)->first();

        return response()->json(Year::whereIn('id', $collage->years)->get(['id', 'name']));
    }

    public function departmentsList($collage_id)
    {
        return response()->json(Department::where('collage_id', $collage_id)->get(['id', 'name']));
    }

    public function studentsList($department_id, $year_id)
    {
        return response()->json(User::where([['department_id', $department_id], ['year_id', $year_id]])->get(['id', 'name']));
    }
}
