<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
  public function validResponse($data, $code = Response::HTTP_OK)
  {
    return response()->json(['data' => $data], $code);
  }
  /**
   * success response of another service
   *
   * @param  mixed $data
   * @param  mixed $code
   * @return void
   */
  public function successResponse($data, $code = Response::HTTP_OK)
  {
    return response($data, $code)->header('Content-Type', 'application/json');
  }

  /**
   * error response dari service api gateway
   *
   * @param  mixed $message
   * @param  mixed $code
   * @return void
   */
  public function errorResponse($message, $code)
  {
    return response()->json(['message' => $message, 'code' => $code], $code);
  }

  /**
   * error message of another service
   *
   * @param  mixed $message
   * @param  mixed $code
   * @return void
   */
  public function errorMessage($message, $code)
  {
    return response($message, $code)->header('Content-Type', 'application/json');
  }
}
