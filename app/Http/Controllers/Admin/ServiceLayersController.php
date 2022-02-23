<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Service;
use App\Models\ServiceLayer;
use Illuminate\Http\Request;

class ServiceLayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        $layers = ServiceLayer::where('service_id', $service->id)->latest()->paginate(10);

        return view('admin.service_layers.index', compact('service', 'layers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        $departments = Department::with('collage:id,name')->get(['id', 'name', 'collage_id'])
                      ->map(function ($department) {
                            return [
                                'id' => $department->id,
                                'name' => $department->name.' - '.$department->collage->name
                            ];
                      });

        return view('admin.service_layers.create', compact('service', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        $layer = ServiceLayer::create($request->input() + ['service_id' => $service->id]);

        return redirect()->route('admin.services.service_layers.index', $service->id)
                         ->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceLayer $serviceLayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, ServiceLayer $serviceLayer)
    {
        $departments = Department::with('collage:id,name')->get(['id', 'name', 'collage_id'])
                                 ->map(function ($department) {
                                     return [
                                         'id' => $department->id,
                                         'name' => $department->name.' - '.$department->collage->name
                                     ];
                                 });

        return view('admin.service_layers.edit', compact('service', 'serviceLayer', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, ServiceLayer $serviceLayer)
    {
        $serviceLayer->update($request->input());

        return redirect()->route('admin.services.service_layers.index', $service->id)
                         ->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, ServiceLayer $serviceLayer)
    {
        $serviceLayer->delete();

        return redirect()->route('admin.services.service_layers.index', $service->id)
                         ->with('success', 'تم حذف البيانات بنجاح');
    }
}
