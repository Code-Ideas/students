<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesResource;
use App\Models\Service;

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
    public function __invoke()
    {
        return ServicesResource::collection(Service::active()->get());
    }
}
