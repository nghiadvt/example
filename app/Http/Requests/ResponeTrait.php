<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ResponseTrait
{
    /**
     * Method response
     *
     * @param string $message
     * @param object|array $data
     * @param int $status
     *
     * @return object
     */
    public function response(string $message, object|array $data, int $status): object
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $status
        ], $status);
    }

    /**
     * RestApi success
     *
     * @param string $message
     * @param object|array $data
     * @param int $status
     *
     * @return object
     */
    public function responseSuccess(string $message, object|array $data = [], int $status = Response::HTTP_OK): object
    {
        return $this->response($message, $data, $status);
    }

    /**
     * RestApi error
     *
     * @param string $message
     * @param object|array $data
     * @param int $status
     *
     * @return object
     */
    public function responseError(string $message, object|array $data = [], int $status = Response::HTTP_BAD_REQUEST): object
    {
        return $this->response($message, $data, $status);
    }
}
