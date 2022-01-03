<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ResponseController extends Controller
{
  public function sendResponse($result, $message): JsonResponse
  {
    $resposnse = [
      'success' => true,
      'data' => $result,
      'errors' => [],
      'message' => $message,
    ];

    return response()->json($resposnse);
  }

  public function sendError($error, $errorMessages = [], $code = 404): JsonResponse
  {
    $response = [
      'success' => false,
      'data' => [],
      'errors' => $errorMessages,
      'message' => $error,
    ];

    return response()->json($response, $code);
  }
}