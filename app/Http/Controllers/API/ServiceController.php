<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LiteracyRequest;
use App\Http\Resources\ServiceLayersResource;
use App\Http\Resources\ServicesResource;
use App\Models\ILiterate;
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
     *      security={{"Bearer":{}}},
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
     *      security={{"Bearer":{}}},
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
        $layers = ServiceLayer::where([['service_id', $service->id], ['department_id', auth()->user()->department_id],
                                        ['year_id', auth()->user()->year_id]])
                          //->orWhere([['service_id', $service->id], ['department_id', auth()->user()->department_id]])
                            ->active()->get();

        return ServiceLayersResource::collection($layers);
    }

    /**
     * @OA\Post(
     *      path="/submit_literacy/",
     *      operationId="submit_literacy",
     *      tags={"Literacy"},
     *      summary="Literacy Form",
     *      description="Add Literacy Trainee",
     *      security={{"Bearer":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"name","address","classroom","classroom_type", "illiterate_id"},
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Trainee Name"
     *                  ),
     *               @OA\Property(
     *                      property="address",
     *                      type="string",
     *                      description="Trainee Address"
     *                  ),
     *               @OA\Property(
     *                      property="illiterate_id",
     *                      type="string",
     *                      description="Trainee National ID"
     *                  ),
     *                  @OA\Property(
     *                      property="classroom",
     *                      type="string",
     *                      description="Trainee Classroom",
     *                      enum={"home", "mosque", "association", "collage"},
     *                      default="collage"
     *                  ),
     *                  @OA\Property(
     *                      property="classroom_type",
     *                      type="string",
     *                      description="Trainee Classroom Type",
     *                      enum={"energizing", "free", "immediate_exam"},
     *                      default="free"
     *                  ),
     *             )
     *         )
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
     * @param LiteracyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitLiteracy(LiteracyRequest $request)
    {
        ILiterate::create($request->input() + ['user_id' => auth()->id()]);

        return response()->json(['message' => 'تم اضافة المتدرب'], 200);
    }
}
