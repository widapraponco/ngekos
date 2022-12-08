<?php

namespace App\Http\Controllers;

use App\Transformers\BaseTransformer;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\Fractal\Serializer\JsonApiSerializer;

class Controller extends BaseController
{

    /**
     * @OA\Info(
     *   title=SWAGGER_LUME_TITLE,
     *   description="RESTful API template made from lumen",
     *   version="1.0",
     *   @OA\Contact(
     *     email="lloricode@gmail.com",
     *     name="Lloric Mayuga Garcia"
     *   ),
     *      @OA\License(
     *          name="MIT",
     *          url="https://opensource.org/licenses/MIT"
     *      )
     * )
     * @OA\Server(
     *      url=SWAGGER_LUME_CONST_HOST,
     *      description="API Server"
     * )
     *
     * @OA\Tag(
     *     name="Authentication",
     *     description="API Endpoints of Authentication"
     * )
     * @OA\Tag(
     *     name="Authorization",
     *     description="API Endpoints of Authorization"
     * )
     *
     * @OA\Schema(
     *      schema="Error",
     *      required={"message"},
     *      @OA\Property(
     *          property="message",
     *          type="string"
     *      )
     *  ),
     */

    /**
     * @param $data
     * @param  \App\Transformers\BaseTransformer  $transformer
     *
     * @return \Spatie\Fractal\Fractal
     */
    protected function fractal($data, BaseTransformer $transformer)
    {
        return fractal($data, $transformer, JsonApiSerializer::class)
            ->withResourceName($transformer->getResourceKey())
            ->addMeta(['include' => $transformer->getAvailableIncludes()]);
    }

    /**
     * @param $code         : api code (not HTTP code)
     */
    protected function getErrorMessage($code) 
    {
        $apiCode = config('error.id');
        $res = response([
            'code'          => $code,
            'message'       => $apiCode[$code]
        ], 403);
        return $res;
    }
}
