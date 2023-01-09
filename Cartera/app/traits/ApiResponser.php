<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
  /**
   * Construye una respuesta de exito
   * 
   * @param data string|array $data.
   * @param code int $code HTTP status code.
   * 
   * @return \Illuminate\Http\JsonResponse
   */
  private function successResponse($data, $code = Response::HTTP_OK)
  {
    return response()->json($data, $code);
  }

  /**
   * Construye una respuesta de error
   * 
   * @param message string|array $message.
   * @param code int $code HTTP status code.
   * 
   * @return \Illuminate\Http\JsonResponse
   */
  protected function errorResponse($message, $code)
  {
    return response()->json(['error' => $message, 'code' => $code], $code);
  }
}
