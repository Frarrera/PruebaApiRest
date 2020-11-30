<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private $service;

    public function __construct(Request $request)
    {
        $this->service = new ProductService($request);
    }

    public function Index () {
        return $this->service->ListAll();
    }

    public function Show($id) {
        return $this->service->Show($id);
    }

    public function Buy($id, BuyRequest $request) {
        return $this->service->Buy($id);
    }
}
