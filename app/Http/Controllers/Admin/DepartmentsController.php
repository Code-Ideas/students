<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentRequest;
use App\Models\Collage;
use App\Models\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $departments = Department::with('collage:id,name')->latest()->paginate(10);

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $collages = Collage::get(['id', 'name']);

        return view('admin.departments.create', compact('collages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->input());

        return redirect()->route('admin.departments.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Department  $department
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Department $department)
    {
        $collages = Collage::get(['id', 'name']);

        return view('admin.departments.edit', compact('collages', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->input());

        return redirect()->route('admin.departments.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
