<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * @OA\Get (
     *     path="/api/posts",
     *      operationId="all_posts",
     *     tags={"posts"},
     *     security={{ "apiAuth": {} }},
     *     summary="All posts",
     *     description="All posts",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="body", type="string", example="body"),
     *              @OA\Property(property="userId", type="number", example=1)
     *         )
     *     ),
     * )
     */
    public function index(Request $request)
    {
        $posts = Posts::all();
        return response()->json(["data"=>$posts],200);
    }

     /**
     * @OA\Get (
     *     path="/api/posts/{id}",
     *     operationId="watch_posts",
     *     tags={"posts"},
     *     security={{ "apiAuth": {} }},
     *     summary="See posts",
     *     description="See posts",
     *    @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="body", type="string", example="body"),
     *              @OA\Property(property="userId", type="number", example=1)
     *         )
     *     ),
     * )
     */
    public function watch($id){
        try{
            $posts = Posts::find($id);
            return response()->json(["data"=>$posts],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/posts",
     *      operationId="store_posts",
     *      tags={"posts"},
     *     security={{ "apiAuth": {} }},
     *      summary="Store posts",
     *      description="Store posts",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
    *             @OA\Property(property="title", type="string", example="title"),
    *             @OA\Property(property="body", type="string", example="body"),
    *             @OA\Property(property="userId", type="number", example=1)
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="body", type="string", example="body"),
     *              @OA\Property(property="userId", type="number", example=1)
     *          )
     *       )
     *  )
     */
    public function register(Request $request)
    {
        $posts = new Posts(request()->all());
        $posts->save();
        return response()->json(["data"=>$posts],200);
    }

    /**
     * @OA\Put(
     *      path="/api/posts/{id}",
     *      operationId="update_posts",
     *      tags={"posts"},
     *     security={{ "apiAuth": {} }},
     *      summary="Update posts",
     *      description="Update posts",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="body", type="string", example="body"),
     *              @OA\Property(property="userId", type="number", example=1)
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="body", type="string", example="body"),
     *              @OA\Property(property="userId", type="number", example=1)
     *          )
     *       )
     *  )
     */

    public function update(Request $request, $id){
        try{
            $posts = Posts::where('id',$id)->first();
            $posts->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/posts/{id}",
     *      operationId="delete_posts",
     *      tags={"posts"},
     *     security={{ "apiAuth": {} }},
     *      summary="Delete posts",
     *      description="Delete posts",
     *    @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */

    public function delete($id){
        try{
            $posts = Posts::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
