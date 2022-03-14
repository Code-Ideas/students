<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceLayersResource;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use App\Models\ServiceLayer;

class ServiceController extends Controller
{
    /**
     * @OA\Get(
     *      path="/services",
     *      operationId="getServicesList",
     *      tags={"Services"},
     *      summary="Get list of services",
     *      description="Returns list of services",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ServicesResource::collection(Service::active()->get());
    }

    /**
     * @OA\Get(
     *      path="/services/{id}",
     *      operationId="getServiceContent",
     *      tags={"Services"},
     *      summary="Get Content of Service",
     *      description="Return Content of Service",
     *      @OA\Parameter(
     *          name="id",
     *          description="Service id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="not found"
     *      ),
     *     )
     */
    public function show(Service $service)
    {
        $layers = ServiceLayer::where('service_id', $service->id)->active()->get();

        return ServiceLayersResource::collection($layers);
    }
}
