<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffMemberRequest;
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
        $staffMembers = Admin::staff()->with('collage:id,name')->withCount('eBooks')->paginate(10);

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
     * @param StaffMemberRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffMemberRequest $request)
    {
        Admin::create($request->except('password') + ['role' => 'staff',
                'password' => bcrypt($request->input('password'))
            ]);

        return redirect()->route('admin.staff_members.index')->with('sucess', 'تم اضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $staffMember
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $staffMember)
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
     * @param StaffMemberRequest $request
     * @param \App\Models\Admin $staffMember
     * @return \Illuminate\Http\Response
     */
    public function update(StaffMemberRequest $request, Admin $staffMember)
    {
        if ($request->filled('password') && $staffMember->password != $request->get('password')) {
            $staffMember->update($request->except('password') + [
                    'password' => bcrypt($request->input('password')),
                ]);
        } else {
            $staffMember->update($request->except('password'));
        }

        return redirect()->route('admin.staff_members.index')->with('sucess', 'تم تعديل البيانات');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $staffMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $staffMember)
    {
        $staffMember->delete();

        return redirect()->route('admin.staff_members.index')->with('sucess', 'تم حذف البيانات');
    }
}
