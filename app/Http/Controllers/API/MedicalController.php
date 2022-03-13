<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MedicalRequest;
use App\Http\Resources\MedicalResource;
use App\Models\MedicalDepartment;
use App\Models\MedicalReservation;

class MedicalController extends Controller
{
     /**
     * @OA\Get(
     *      path="/medical_departments",
     *      operationId="getMedicalDepartmentsList",
     *      tags={"Medical"},
     *      summary="Get list of medical_departments",
     *      description="Returns list of medical_departments",
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
    public function show()
    {
        $medical_departments = MedicalResource::collection(MedicalDepartment::active()->get());
        return  $medical_departments;
    }

     /**
     * @OA\Post(
     *      path="/medical_reservations/{department_id}",
     *      operationId="medical reservation",
     *      tags={"Medical"},
     *      summary="Medical Reservation",
     *      description="Medical Reservation",
     *      security={{"Bearer":{}}},
     *      @OA\Parameter(
     *            description="ID of medical_department",
     *            in="path",
     *            name="department_id",
     *            required=true,
     *            example="1",
     *           ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"email","phone","message"},     *
     *                  @OA\Property(
     *                      property="email",
     *                      type="string",
     *                      description="Sender Email"
     *                  ),
     *                  @OA\Property(
     *                      property="phone",
     *                      type="string",
     *                      description="Sender Phone"
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      type="string",
     *                      description="Message Content"
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
     * @param MedicalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(MedicalRequest $request, MedicalDepartment $medical_departments)
    {
        MedicalReservation::with('user','medicalDepartment:id,name')->create($request->input()+
         ['user_id'=>auth()->user()->id ,'medical_department_id' => $request->department_id ]);

        return response()->json(['message' => 'Request Send Successfully'], 200);
    }
}




