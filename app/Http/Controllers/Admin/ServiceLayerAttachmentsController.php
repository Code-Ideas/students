<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceLayerAttachmentRequest;
use App\Models\ServiceLayer;
use App\Models\ServiceLayerAttachment;
use Illuminate\Http\Request;

class ServiceLayerAttachmentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceLayerAttachmentRequest $request
     * @param ServiceLayer $serviceLayer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceLayerAttachmentRequest $request, ServiceLayer $serviceLayer)
    {
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                ServiceLayerAttachment::create([
                    'file_name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                    'type' => 'file', 'service_layer_id' => $serviceLayer->id,
                    'path' => $file->store('service_layers/service_layer_'.$serviceLayer->id, 'public')]);
            }
            return redirect()->back()->with('success', 'تم اضافة الملفات !');
        } else {
            return redirect()->back()->withErrors('لم يتم اختيار ملفات صحيحة !');
        }
    }

    /**
     * @param ServiceLayerAttachment $attachment
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ServiceLayerAttachment $attachment)
    {
        $attachment->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true ], 200);
        }

        return redirect()->back()->with('success', 'تم حذف الملف بنجاح !');
    }
}
