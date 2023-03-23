<?php

namespace App\Traits;

trait RespondsWithHttpStatus
{
    protected function success($message, $status = 200)
    {
        return response([
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $status = 422)
    {
        return response([
            'message' => $message,
        ], $status);
    }
}
