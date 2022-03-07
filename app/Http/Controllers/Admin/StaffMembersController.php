<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Collage;
use Illuminate\Http\Request;

class StaffMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffMembers = Admin::staff()->with('collage:id,name')->paginate(10);

        return view('admin.staff_members.index', compact('staffMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collages = Collage::get(['id', 'name']);

        return view('admin.staff_members.create', compact('collages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Admin::create($request->except('password') + ['role' => 'staff',
                'password' => bcrypt($request->input('password'))
            ]);

        return redirect()->route('admin.staff_members.index')->with('sucess', 'تم اضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $staffMember
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $staffMember)
    {
        $collages = Collage::get(['id', 'name']);

        return view('admin.staff_members.edit', compact('staffMember', 'collages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $staffMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $staffMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $staffMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $staffMember)
    {
        //
    }
}
