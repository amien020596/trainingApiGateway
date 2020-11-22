<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

  /**
   * success response of another service
   */
  public function successResponse($data, $code = Response::HTTP_OK)
  {
    return response($data, $code)->header('Content-Type', 'application/json');
  }

  /**
   * error response dari service api gateway
   */
  public function errorResponse($message, $code)
  {
    return response()->json(['message' => $message, 'code' => $code], $code);
  }
  /**
   * error message of another service
   */
  public function errorMessage($message, $code)
  {
    return response($message, $code)->header('Content-Type', 'application/json');
  }
}
