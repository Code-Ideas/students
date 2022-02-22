<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminDepartment;
use App\Models\Collage;
use Illuminate\Http\Request;

class AdminDepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = AdminDepartment::with('collage:id,name')->withCount('admins')->latest()->paginate(10);

        return view('admin.admin_departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collages = Collage::get(['id', 'name']);

        return view('admin.admin_departments.create', compact('collages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AdminDepartment::create($request->input());

        return redirect()->route('admin.admin_departments.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminDepartment  $adminDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(AdminDepartment $adminDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminDepartment  $adminDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminDepartment $adminDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminDepartment  $adminDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminDepartment $adminDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminDepartment  $adminDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminDepartment $adminDepartment)
    {
        //
    }
}
