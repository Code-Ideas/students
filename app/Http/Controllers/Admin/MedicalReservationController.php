<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalReservation;

class MedicalReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_reservations = MedicalReservation::with('user','medicalDepartment:id,name')->latest()->paginate(10);

        return view('admin.medical_reservations.index', compact('medical_reservations'));
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
     * @param  \App\Models\MedicalReservation  $medical_reservation
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalReservation $medical_reservation)
    {
        return view('admin.medical_reservations.show', compact('medical_reservation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\MedicalReservation  $medical_reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalReservation $medical_reservation)
    {
        $medical_reservation->delete();

        return redirect()->route('admin.medical_reservations.index')->with('success', 'تم حذف الرسالة');

    }
}
