<?php
namespace App\Services;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class Service {

    use ApiResponse;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}