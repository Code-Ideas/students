<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceLayerRequest;
use App\Models\Collage;
use App\Models\Department;
use App\Models\Service;
use App\Models\ServiceLayer;
use App\Models\ServiceLayerAttachment;
use App\Models\Year;
use Illuminate\Http\Request;

class ServiceLayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Service $service)
    {
        $layers = ServiceLayer::where('service_id', $service->id)->latest()->paginate(10);

        return view('admin.service_layers.index', compact('service', 'layers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Service $service, Request $request)
    {
        $type = $request->get('content_type', 'content');
        $years = Year::active()->get(['id', 'name']);
        $departments = Department::whereIn('collage_id', $service->collages)->with('collage:id,name')
                                ->get(['id', 'name', 'collage_id'])
                                ->map(function ($department) {
                                    return [
                                        'id' => $department->id,
                                        'name' => $department->collage->name.' - '.$department->name
                                    ];
                                });

        return view('admin.service_layers.create', compact('service', 'departments', 'years', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceLayerRequest $request
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceLayerRequest $request, Service $service)
    {
        $layer = ServiceLayer::create($request->input() + [
                'service_id' => $service->id, 'content_type' => $request->content_type]);
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                ServiceLayerAttachment::create([
                    'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'type' => 'file', 'service_layer_id' => $layer->id,
                    'path' => $file->store('service_layers/service_layer_'.$layer->id, 'public')]);
            }
        }

        return redirect()->route('admin.services.service_layers.index', $service->id)
                         ->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, ServiceLayer $serviceLayer)
    {
        return view('admin.service_layers.show', compact('service', 'serviceLayer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Service $service, ServiceLayer $serviceLayer)
    {
        $type = $serviceLayer->content_type;
        $years = Year::active()->get(['id', 'name']);
        $departments = Department::with('collage:id,name')->get(['id', 'name', 'collage_id'])
                                 ->map(function ($department) {
                                     return [
                                         'id' => $department->id,
                                         'name' => $department->name.' - '.$department->collage->name
                                     ];
                                 });

        return view('admin.service_layers.edit', compact('service', 'serviceLayer', 'departments', 'years', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service, ServiceLayer $serviceLayer)
    {
        Request::route()->getActionMethod();
        $serviceLayer->update($request->input());

        return redirect()->route('admin.services.service_layers.index', $service->id)
                         ->with('success', 'تم تحديث البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceLayer  $serviceLayer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Service $service, ServiceLayer $serviceLayer)
    {
        $serviceLayer->delete();

        return redirect()->route('admin.services.service_layers.index', $service->id)
                         ->with('success', 'تم حذف البيانات بنجاح');
    }
}
