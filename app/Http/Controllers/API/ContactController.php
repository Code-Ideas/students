<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ContactRequest;
use App\Http\Resources\AdminDepartmentsResource;
use App\Models\AdminDepartment;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     /**
     * @OA\Get(
     *      path="/admin_departments",
     *      operationId="getAdminDepartmentsList",
     *      tags={"Contact"},
     *      summary="Get list of admin_departments",
     *      description="Returns list of admin_departments",
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
    public function index()
    {
        return AdminDepartmentsResource::collection(AdminDepartment::get());

    }
    /**
     * @OA\Post(
     *      path="/contact",
     *      operationId="send_message",
     *      tags={"Contact"},
     *      summary="Contact Message Endpoint",
     *      description="Send Message",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"name","email","phone","message","admin_department_id"},
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Sender Name"
     *                  ),
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
     *                  @OA\Property(
     *                      property="admin_department_id",
     *                      type="integer",
     *                      description="ID of admin_department"
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
     * @param ContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ContactRequest $request)
    {
        Contact::create($request->input());

        return response()->json(['message' => 'Request Send Successfully'], 200);
    }
}
