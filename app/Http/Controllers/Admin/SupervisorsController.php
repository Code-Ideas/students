<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminDepartment;
use Illuminate\Http\Request;

class SupervisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors = Admin::supervisors()->with('collage:id,name')->paginate(20);

        return view('admin.supervisors.index', compact('supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = AdminDepartment::get(['id', 'name']);

        return view('admin.supervisors.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Admin::create($request->except('password') + ['role' => 'supervisor',
                'password' => bcrypt($request->input('password'))
            ]);

        return redirect()->route('admin.supervisors.index')->with('sucess', 'تم انشاء المشرف');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $supervisor)
    {
        $departments = AdminDepartment::get(['id', 'name']);

        return view('admin.supervisors.edit', compact('supervisor', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $supervisor)
    {
        if ($request->filled('password') && $supervisor->password != $request->get('password')) {
            $supervisor->update($request->except('password') + [
                    'password' => bcrypt($request->input('password')),
                ]);
        } else {
            $supervisor->update($request->except('password'));
        }

        return redirect()->route('admin.supervisors.index')->with('sucess', 'تم تعديل البيانات');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $supervisor)
    {
        $supervisor->delete();

        return redirect()->route('admin.supervisors.index')->with('sucess', 'تم حذف البيانات');
    }
}
