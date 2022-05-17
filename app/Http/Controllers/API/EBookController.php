<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EBookResource;
use App\Models\EBook;
use Illuminate\Http\Request;

class EBookController extends Controller
{
     /**
     * @OA\Get(
     *      path="/e_books",
     *      operationId="getEBooks",
     *      tags={"EBooks"},
     *      summary="Get list of e_books",
     *      description="Returns list of e_books",
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
    public function index()
    {
        $ebooks = EBook::where([['department_id', auth()->user()->department_id],['year_id', auth()->user()->year_id]])
        ->published()->get();
        return EBookResource::collection($ebooks);
    }
}




