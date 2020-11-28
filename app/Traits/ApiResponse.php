<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

trait ApiResponse
{
    /**
     * Show one entity
     *
     * @param $resource
     * @param int $code
     */
    public function showOne($entity, int $code = 200)
    {
        return response()->json([
            'data' => $entity
        ], $code);
    }

    /**
     * Show multiples entities
     *
     * @param array $entities
     * @param int $code
     */
    public function showAll(array $entities, int $code = 200)
    {
        return response()->json([
            'data' => $entities
        ], $code);
    }

    /**
     * Show error
     *
     * @param string $message
     * @param array $errors
     * @param int $code
     */
    public function showError(string $message, array $errors, int $code)
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}
