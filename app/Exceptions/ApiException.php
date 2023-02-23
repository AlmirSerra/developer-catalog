<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiException extends Exception
{
    protected $statusCode;
    protected $errorCode;

    public function __construct(string $message, int $statusCode, int $errorCode = 0)
    {
        $this->statusCode = $statusCode;
        $this->errorCode = $errorCode;
        parent::__construct($message);
    }

    public function render()
    {
        return new JsonResponse([
            'error' => [
                'code' => $this->errorCode,
                'message' => $this->getMessage(),
            ]
        ], $this->statusCode);
    }
}
