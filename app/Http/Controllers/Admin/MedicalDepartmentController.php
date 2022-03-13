<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalDepartment;


class MedicalDepartmentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $medical_departments = MedicalDepartment::latest()->paginate(10);

        return view('admin.medical_departments.index', compact('medical_departments'));
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.medical_departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        MedicalDepartment::create($request->input());

        return redirect()->route('admin.medical_departments.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalDepartment  $medical_department
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalDepartment $medical_department)
    {
        return view('admin.medical_departments.edit', compact('medical_department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalDepartment  $medical_department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalDepartment $medical_department)
    {
        $medical_department->update($request->input());
        return redirect()->route('admin.medical_departments.index')->with('success', 'تم تعديل البيانات بنجاح');

    }



}
